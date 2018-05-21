<?php

class stamps_com
{
    private $authenticator;
    private $client;
    private $account;
    private $ServiceType = array(
        "US-FC"     =>  "USPS First-Class Mail",
        "US-MM"     =>  "USPS Media Mail",
        "US-PP"     =>  "USPS Parcel Post",
        "US-PM"     =>  "USPS Priority Mail",
        "US-XM"     =>  "USPS Priority Mail Express",
        "US-EMI"    =>  "USPS Priority Mail Express International",
        "US-PMI"    =>  "USPS Priority Mail International",
        "US-FCI"    =>  "USPS First Class Mail International",
        "US-CM"     =>  "USPS Critical Mail",
        "US-PS"     =>  "USPS Parcel Select",
        "US-LM"     =>  "USPS Library Mail"
    );
    public function __construct($wsdl, $integrationID, $username, $password)
    {
        $this->client = new SoapClient($wsdl);
        $authData = [
            "Credentials"   => [
                "IntegrationID"     => $integrationID,
                "Username"          => $username,
                "Password"          => $password
            ]
        ];
        $this->makeCall('AuthenticateUser', $authData);
        $this->account = $this->makeCall('GetAccountInfo', ["Authenticator" => $this->authenticator]);
    }
    private function makeCall($method, $data) {
        $result = $this->client->$method($data);
        $this->authenticator = $result->Authenticator;
        return $result;
    }
    public function GetRates($FromZIPCode, $ToZIPCode = null, $st = null, $ToCountry = null, $WeightLb, $Length, $Width, $Height, $PackageType, $ShipDate, $InsuredValue, $ToState = null)
    {
		$options = array();
        $data = [
            "Authenticator" => $this->authenticator,
            "Rate"      => [
                "FromZIPCode"   => $FromZIPCode,
                "WeightLb"  => $WeightLb,
                "Length"    => $Length,
                "Width"     => $Width,
                "Height"    => $Height,
                "PackageType"   => $PackageType,
                "ShipDate"  => $ShipDate
            ]
        ];
        if ($ToZIPCode == null && $ToCountry != null) {
            $data["Rate"]['ToCountry'] = $ToCountry;
        } else {
            $data["Rate"]['ToZIPCode'] = $ToZIPCode;
        }
        if ($ToState != null) {
            $data["Rate"]['ToState'] = $ToState;
        }
		if ($st != null) {
			$data["Rate"]['ServiceType'] = $st;
		}
        $rates = $this->makeCall('getRates', $data)->Rates->Rate;
		//echo "<pre>rates:";print_r($rates);echo "</pre>";
        foreach ($rates as $k => $v) {
            foreach ($data['Rate'] as $kk => $vv) {
                $result[$k][$kk] = $v->$kk;
            }
            $result[$k] =  $result[$k] + array(
                "ServiceType" => $this->ServiceType[$v->ServiceType],
                "Amount" => $v->Amount,
                "PackageType" => $v->PackageType,
                "WeightLb" => $v->WeightLb,
                "Length" => $v->Length,
                "Width" => $v->Width,
                "Height" => $v->Height,
                "ShipDate" => $v->ShipDate,
                "DeliveryDate" => property_exists($v, 'DeliveryDate') ? $v->DeliveryDate : 'Unavailable',
                "RateCategory" => $v->RateCategory,
                "ToState" => $v->ToState,
            );
        }
	//echo "<pre>";print_r($result);echo "</pre>";
	$count = count($result);
	$x = 0;
	for ($i = 0; $i < $count; $i++){
		if ($result[$i]["ServiceType"] == "USPS Priority Mail") {
			$options[$x] = $result[$i];
			$x++;
		}
		if ($result[$i]["ServiceType"] == "USPS Priority Mail Express") {
			$options[$x] = $result[$i];
			$x++;
		}
			
		if ($result[$i]["ServiceType"] == "USPS Parcel Select") {
			$options[$x] = $result[$i];
			$x++;
		}
	}
    return $options;
    }
	
	public function CleanseAddress($Fname, $Lname, $Street, $City, $State, $Zip) {
		
		$data = [
			"Authenticator" => $this->authenticator,
			"Address"  => [
				"FirstName" => $Fname,
				"LastName"  => $Lname,
				"Address1"  => $Street,
				"City"      => $City,
				"State"     => $State,
				"ZIPCode"   => $Zip
			]
		];
		$clean = $this->makeCall('CleanseAddress', $data);
	return json_encode($clean);
	}
	
	public function CreateIndicium ($to, $sc, $sdes, $sd) {
		    // 4. Generate label
   $IntegratorTxID=time();
     /**
	 * If true, generates a sample label without real value.
	 * @var bool
	 */ 
	  //$Loger = new Logger();
	  
	switch ($sdes) {
		case "USPS Priority Mail":
			$st = "US-PM";
			break;
		case "USPS Priority Mail Express":
			$st = "US-XM";
			break;
		case "USPS Parcel Select":
			$st = "US-PS";
			break;
	}  
	 
	$isSampleOnly = true;
		$labelOptions = [
			'Authenticator'     =>$this->authenticator,
			'IntegratorTxID'    => $IntegratorTxID,
			'SampleOnly'        =>$isSampleOnly,
			'ImageType'         => 'Auto',
			'TrackingNumber' => '',
			'Rate' => [
				'FromZIPCode' => 52501,
				'ToZIPCode'   => $to->zip,
				'Amount'      => $sc,
				'ServiceType' => $st,
				'ServiceDescription' => $sdes,
				'PackageType' => "Package",
				'ShipDate'    => $sd,
				'ContentType' => "Merchandise"
			],

			'From' => [
			  'FullName'  => 'Berry Patch It Services',
				'Address1'  => '15330 Truman Street',
				'City'      => 'Ottumwa',
				'State'     => 'Iowa',
				'ZIPcode'   => '52501'
			],

			'To' => [
				'FullName'  => $to->name,
				'Address1'  => $to->address1,
				'Address2'  => $to->address2,
				'City'      => $to->city,
				'State'     => $to->state,
				'ZIPCode'   => $to->zip
			]
		];

		$indiciumResponse = $this->makeCall('CreateIndicium', $labelOptions);
		   /**
	 * If use tracking $indiciumResponse->TrackingNumber
	 * 
	 */
	  /**
	 * If download label $indiciumResponse->URL
	 * 
	 */ 

	 $filename=false;
	 //$Loger->msg(LOG_ERROR,"stamps 1 ".$Loger->var_ex($labelOptions), __FILE__, __LINE__);
	 // $Loger->msg(LOG_ERROR,"stamps 2 ".$Loger->var_ex($indiciumResponse), __FILE__, __LINE__);
	 if(!isset($indiciumResponse->URL)){
			return array('err'=>'yes','code'=>_('No create label'));  


		}
		if(is_array($indiciumResponse) && !count($indiciumResponse)){
			return array('err'=>'yes','code'=>_('No create label'));  


		}
		if ($filename) {

			$ch = curl_init($indiciumResponse->URL);
			$fp = fopen($filename, 'wb');
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_exec($ch);
			curl_close($ch);
			fclose($fp);
		}



		$daa['err']='no';
		$daa['URL']=$indiciumResponse->URL;
		$daa['TrackingNumber']=$indiciumResponse->TrackingNumber;
		return $daa ;
		}
		
		public function PurchasePostage ($a, $ct) {
			$data = [
		"Authenticator" => $this->authenticator,
		"PurchaseAmount" => $a,
		"ControlTotal" => $ct];
		
		$amount = $this->makeCall('PurchasePostage', $data);
		return $amount;
		}
		
		public function GetAccountInfo () {
			$data = [
		"Authenticator" => $this->authenticator];
		$acc = $this->makeCall('GetAccountInfo', $data);
		return $acc;
		}
		
		public function TrackShipment ($tr) {
			$data = [
		"Authenticator" => $this->authenticator,
		"TrackingNumber" => $tr];
		$track = $this->makeCall('TrackShipment', $data);
		return $track;
		}
}

?>