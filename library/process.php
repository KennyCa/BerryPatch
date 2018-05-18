<?php

	$cartarray = $_SESSION['array'];
	$qtyord = $_SESSION['qtyord'];
	$ind = count($cartarray);
	$itemarray = $_SESSION['itemarray'];
	
	$ordered['customer']['firstname'] = $_SESSION['fname']; 
	$ordered['customer']['lastname'] = $_SESSION['lname'];
	$ordered['customer']['street'] = $_SESSION['street'];
	$ordered['customer']['city'] = $_SESSION['city'];
	$ordered['customer']['state'] = $_SESSION['state'];
	$ordered['customer']['zip'] = $_SESSION['zip'];
	$ordered['customer']['zip4'] = $_SESSION['zip4'];
	
	for ($i = 0; $i < $ind; $i++){
		$ordered['customer']['items'][$i] = $itemarray[$cartarray[$i]];
		$ordered['customer']['items'][$i]['qty'] = $qtyord[$i];
		
	if ($itemarray[$cartarray[$i]]['qty'] > $qtyord[$i]) {
			$itemarray[$cartarray[$i]]['qty'] -= $qtyord[$i];
		} else {
			array_splice($itemarray, $i, 1);
		}
			
		
	}
	file_put_contents('library/itemarray.php',json_encode($itemarray));
	echo "<pre>";print_r($itemarray);echo "</pre>";
	echo "<pre>";print_r($ordered);echo "</pre>";
	
	$user = "root"; 
	$password = ""; 
	$host = "localhost:3306"; 
	$dbase = "berrypatch"; 
	
	// CONNECTING TO THE DATABASE
 	$conn = new mysqli($host, $user, $password, $dbase);
	if (!$conn)
	{
	die ('Could not connect:' . $conn->connect_error);
	} 
	
	// DOING THE QUERY
	if(!empty($ordered)){

		$fname = $ordered['customer']['firstname'];
		$lname = $ordered['customer']['lastname']; 
		$street = $ordered['customer']['street'];
		$city = $ordered['customer']['city'];
		$state = $ordered['customer']['state'];
		$zip = $ordered['customer']['zip'];
		$zip4 = $ordered['customer']['zip4'];
		$printed = 'F';
		$custid = 0;
		
		//echo "Checking if customer id exist<br>";
		$sql = "SELECT cust_id FROM `customer` WHERE firstname = ? and lastname = ?";
		if ($stmt = $conn->prepare($sql)) {
			//echo "prepared 1 select<br>";
		} else {
			//echo "prepare 1 failed<br>";
		}
		$stmt->bind_param('ss', $fname, $lname);
		$stmt->execute();
		$stmt->store_result();		
		$stmt->bind_result($custid);
		$result = $stmt->fetch();
		//echo "Customer id =".$custid."<br>";
		//var_dump($custid);
		//echo $result."fetch<br>";
		
		if ($custid == 0) {
			$sql = "INSERT INTO `customer` (`firstname`, `lastname`, `street`, `city`, `state`, `zip`, `zip4`) VALUES (?, ?, ?, ?, ?, ?, ?)";
			
			if ($stmt = $conn->prepare($sql)) {
			//echo "prepared<br>";
			
				if ($stmt->bind_param('sssssii', $fname, $lname, $street, $city, $state, $zip, $zip4)) {
					//echo "binded<br>";
				}
				
				if ($stmt->execute()) {
					//echo "executed<br>";
				}
			}
			$custid = $conn->insert_id;
			//echo $custid." second<br>";
		} 
		
		//echo "inserting into orders<br>";
		$date = date("Ymd");
		//echo "Date: ".$date."<br>";
		$cc4 = $transaction->creditCardDetails->last4;
		//echo "cc4: ".$cc4."<br>";
		$method = $_SESSION['stamp']['ServiceType'];
		$shipcost = $_SESSION['stamprate'];
		$sql = "INSERT INTO `orders`(customer_id, order_date, ship_method, ship_cost, cc4, printed) VALUES (?,?,?,?,?,?)";
		
		if ($stmt = $conn->prepare($sql)) {
			echo "prepared orders<br>";
		} else {
			echo "prepare failed<br>";
		}
		$stmt->bind_param('issdis', $custid, $date, $method, $shipcost, $cc4, $printed);
		$stmt->execute();
		$last_id = $conn->insert_id;
		//echo $last_id."Orders<br>";
		$sql = "INSERT INTO `items` (order_num, item_num, item, description, cost, qty, lbs, oz, imagename, imagepath) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);

		
		$count = count($ordered['customer']['items']);
		//echo $count."count<br>";
		
		for ($i = 0; $i < $count; $i++) {
			$itemnum = $i + 1;
			$item = $ordered['customer']['items'][$i]['name'];
			$description = $ordered['customer']['items'][$i]['description'];
			$cost = doubleval(preg_replace("/[^0-9.]/", "",$ordered['customer']['items'][$i]['cost']));
			$qty = $ordered['customer']['items'][$i]['qty'];
			$lbs = $ordered['customer']['items'][$i]['lbs'];
			$oz = $ordered['customer']['items'][$i]['oz'];
			$iname = $ordered['customer']['items'][$i]['imagename'];
			$ipath = $ordered['customer']['items'][$i]['imagepath'];

			$stmt->bind_param('iissdiiiss', $last_id, $itemnum, $item, $description, $cost, $qty, $lbs, $oz, $iname, $ipath);
			$stmt->execute();
			//echo "here ".$i;
		}
		
	}
	// CLOSING THE CONNECTION
	$stmt->close();
	$conn->close();
?>