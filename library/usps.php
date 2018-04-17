<?php
function USPSParcelRate($lbs, $oz, $dest_zip, $lbs2, $oz2) {

// ========== CHANGE THESE VALUES TO MATCH YOUR OWN ===========

$userName = '418BERRY6378'; // Your USPS Username
$orig_zip = '52501'; // Zipcode you are shipping FROM

// =============== DON'T CHANGE BELOW THIS LINE ===============
$options = array();
$url = "http://production.shippingapis.com/ShippingAPI.dll?API=RateV4&";
$ch = curl_init();

// set the target url
curl_setopt($ch, CURLOPT_URL,$url);
//curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

// parameters to post
curl_setopt($ch, CURLOPT_POST, 1);

if ($lbs2 == 0) {
	$pack = 1;

$data = "
<RateV4Request USERID=\"$userName\">
<Revision>2</Revision>
	<Package ID='1ST'>
	<Service>ALL</Service>
	<FirstClassMailType>RETAIL</FirstClassMailType>
	<ZipOrigination>$orig_zip</ZipOrigination>
	<ZipDestination>$dest_zip</ZipDestination>
	<Pounds>$lbs</Pounds>
	<Ounces>$oz</Ounces>
	<Container>VARIABLE</Container>
	<Size>REGULAR</Size>
	<Width>15</Width>
	<Length>30</Length>
	<Height>15</Height>
	<Machinable>true</Machinable>
	</Package>
</RateV4Request>";

} else {
	$pack = 2;
$data = "
<RateV4Request USERID=\"$userName\">
<Revision>2</Revision>
<Package ID='1ST'>
<Service>ALL</Service>
<FirstClassMailType>FIRST CLASS</FirstClassMailType>
<ZipOrigination>$orig_zip</ZipOrigination>
<ZipDestination>$dest_zip</ZipDestination>
<Pounds>$lbs</Pounds>
<Ounces>$oz</Ounces>
<Container>RECTANGULAR</Container>
<Size>LARGE</Size>
<Width>15</Width>
<Length>30</Length>
<Height>15</Height>
<Machinable>true</Machinable>
</Package>
<Package ID='2ND'>
<Service>ALL</Service>
<FirstClassMailType>FIRST CLASS</FirstClassMailType>
<ZipOrigination>$orig_zip</ZipOrigination>
<ZipDestination>$dest_zip</ZipDestination>
<Pounds>$lbs2</Pounds>
<Ounces>$oz2</Ounces>
<Container>RECTANGULAR</Container>
<Size>LARGE</Size>
<Width>15</Width>
<Length>30</Length>
<Height>15</Height>
<Machinable>true</Machinable>
</Package>
</RateV4Request>";
} 

// send the POST values to USPS
curl_setopt($ch, CURLOPT_POSTFIELDS,'XML='.$data);

$result = curl_exec ($ch);
//echo curl_error($ch);
curl_close($ch);
$x = 0;

$array_data = json_decode(json_encode(simplexml_load_string($result)), true);
echo '<pre>'; print_r($array_data); echo'</pre>';

for ($z = 0; $z < $pack; $z++){
	if ($pack == 1){
		$shipmethod = count($array_data['Package']['Postage']);
		for ($i = 0; $i < $shipmethod; $i++) {
				if ($array_data['Package']['Postage'][$i]['@attributes']['CLASSID'] == 1) {
					$options[$x] =  $array_data['Package']['Postage'][$i];
					$x++;
				}
				if ($array_data['Package']['Postage'][$i]['@attributes']['CLASSID'] == 3) {
					$options[$x] =  $array_data['Package']['Postage'][$i];
					$x++;
				}
				if ($array_data['Package']['Postage'][$i]['@attributes']['CLASSID'] == 4) {
					$options[$x] =  $array_data['Package']['Postage'][$i];
					$x++;
				}
		}
	} else {
		$shipmethod = count($array_data['Package'][$z]['Postage']);
		for ($i = 0; $i < $shipmethod; $i++) {
			if ($z == 0) {
				if ($array_data['Package'][$z]['Postage'][$i]['@attributes']['CLASSID'] == 1) {
					$options[0] =  $array_data['Package'][$z]['Postage'][$i];
					$x++;
				}
				if ($array_data['Package'][$z]['Postage'][$i]['@attributes']['CLASSID'] == 3) {
					$options[1] =  $array_data['Package'][$z]['Postage'][$i];
					$x++;
				}
				if ($array_data['Package'][$z]['Postage'][$i]['@attributes']['CLASSID'] == 4) {
					$options[2] =  $array_data['Package'][$z]['Postage'][$i];
					$x++;
				}
			} else {
				$x = 0;
				if ($array_data['Package'][$z]['Postage'][$i]['@attributes']['CLASSID'] == 1) {
					$options[0]['Rate'] +=  $array_data['Package'][$z]['Postage'][$i]['Rate'];
					$x++;
				}
				if ($array_data['Package'][$z]['Postage'][$i]['@attributes']['CLASSID'] == 3) {
					$options[1]['Rate'] +=  $array_data['Package'][$z]['Postage'][$i]['Rate'];
					$x++;
				}
				if ($array_data['Package'][$z]['Postage'][$i]['@attributes']['CLASSID'] == 4) {
					$options[2]['Rate'] +=  $array_data['Package'][$z]['Postage'][$i]['Rate'];
					$x++;
				}
			}
		}
}
}
return $options;
}
?>