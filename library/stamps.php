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
    public function GetRates($FromZIPCode, $ToZIPCode = null, $ToCountry = null, $WeightLb, $Length, $Width, $Height, $PackageType, $ShipDate, $InsuredValue, $ToState = null)
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
        $rates = $this->makeCall('getRates', $data)->Rates->Rate;
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
}

?>