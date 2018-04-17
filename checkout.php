<?php
require_once 'braintree-php-3.29.0/lib/Braintree.php';
session_start();
$amount = $_POST["amount"];
$nonce = $_POST["payment_method_nonce"];

	$gateway = $_SESSION['gateway'];
	
	$result = $gateway->transaction()->sale([
		'amount' => $amount,
		'paymentMethodNonce' => $nonce,
		'shipping' => [
			'firstName' => $_SESSION["fname"],
			'lastName' => $_SESSION["lname"],
			'company' => 'null',
			'streetAddress' => $_SESSION["street"],
			'extendedAddress' => 'null',
			'locality' => $_SESSION["city"],
			'region' => $_SESSION["state"],
			'postalCode' => $_SESSION["zip"],
			'countryCodeAlpha2' => 'US'
		  ],
		'options' => [
			'submitForSettlement' => true
		  ]
		]);
		
	if ($result->success || !is_null($result->transaction)) {
		$transaction = $result->transaction;
		header("Location: transaction.php?id=" . $transaction->id);
	} else {
		$errorString = "";
		foreach($result->errors->deepAll() as $error) {
			$errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
		}
		$_SESSION["errors"] = $errorString;
		echo "here";
		header("Location: confirm.php");
	}