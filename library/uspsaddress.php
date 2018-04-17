<?php
function VerifyAddress ($s, $c, $st, $z) {
	
// ========== CHANGE THESE VALUES TO MATCH YOUR OWN ===========

$userName = '418BERRY6378'; // Your USPS Username

$url = "http://production.shippingapis.com/ShippingAPI.dll?API=Verify&";
$ch = curl_init();

// set the target url
curl_setopt($ch, CURLOPT_URL,$url);
//curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

// parameters to post
curl_setopt($ch, CURLOPT_POST, 1);

$data = "
<AddressValidateRequest USERID=\"$userName\">
<Address>
	<Address1></Address1>
	<Address2>$s</Address2>
	<City>$c</City>
	<State>$st</State>
	<Zip5>$z</Zip5>
	<Zip4></Zip4>
</Address>

</AddressValidateRequest>";

// send the POST values to USPS
curl_setopt($ch, CURLOPT_POSTFIELDS,'XML='.$data);

$result = curl_exec ($ch);
//echo curl_error($ch);
curl_close($ch);

$array_data = json_decode(json_encode(simplexml_load_string($result)), true);
//echo '<pre>'; print_r($array_data); echo'</pre>';

return $array_data;
}
?>