<?php
	//require ("library/uspsaddress.php");
	//require ("library/usps.php");

	session_start();
	
	
	$options = array();
	
	$hide = "hidden";
	$vis = "visible";
	$_SESSION['error'] = false;
	
	
if (isset($_GET['ship'])) {

	$_SESSION['fname'] = "";
	$_SESSION['lname'] = "";
	$_SESSION['street'] = "";
	$_SESSION['add2'] = "";
	$_SESSION['city'] = "";
	$_SESSION['state'] = "";
	$_SESSION['zip'] = "";
	$count = 0;
	$hide = "hidden";
	$vis = "visible";

}

if (isset($_POST['submit'])) {

	require ("library/stamps.php");

	$address = array();
	
	$wsdl           = "https://swsim.testing.stamps.com/swsim/swsimv69.asmx?wsdl";
	$integrationID  = "6ccdfb3b-7ce6-49e5-94ff-e71b96792d04";
	$username       = "BerryPatch-001";
	$password       = "postage1";
	$stamps     = new stamps_com($wsdl, $integrationID, $username, $password);
	$shipDate   = date('Y-m-d');
	
	$address = json_decode($stamps->CleanseAddress($_POST['fname'], $_POST['lname'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip']), true);
	echo "<pre>";print_r($address);echo"</pre>";
	
	if (isset($address['Address']['Error'])){
		$_SESSION['error'] = true;
		header("Refresh:0");
		
	} else {
		$hide = "visible";
		$vis = "hidden";
	
		$_SESSION['fname'] = $address['Address']['FirstName'];
		$_SESSION['lname'] = $address['Address']['LastName'];
		$_SESSION['street'] = $address['Address']['Address1'];
		$_SESSION['add2'] = $address['Address']['Address2'];
		$_SESSION['city'] = $address['Address']['City'];
		$_SESSION['state'] = $address['Address']['State'];
		$_SESSION['zip'] = $zip = $address['Address']['ZIPCode'];
		$_SESSION['zip4'] = $address['Address']['ZIPCodeAddOn'];

		$lbs = $_SESSION['lbs'];
		$ozs = $_SESSION['ozs'];
		$lbs2 = $_SESSION['lbs2'];
		$ozs2 = $_SESSION['ozs2'];
		
		$options = $stamps->GetRates("52501", $zip, null, null, $lbs, 6, 6, 6, "Package", $shipDate, 0, null );
		
		//echo "<pre>";print_r($options);echo"</pre>";
		
		$_SESSION['usps'] = $options;
		$count = count($options);
		
		//echo '<br><pre>'; print_r($options); echo'</pre>';
	}
}
if (isset($_POST['go'])) {
	$_SESSION['uspsind'] = $_POST['ship'];
	header('Location: confirm.php');
	
}

?>
<html>
<head>
	<?php require('library/head.php'); ?>
</head>

										<!-- three section body display-->
<body>
										<!--section one: shipping form-->
<header>
	
</header>
<content class="container-fluid">
	<br><br><br><br><br>
	<div class="row col-sm-offset-3 col-sm-6";>
		<div id="contact-form" style="background-color: #f8f8f8;padding-bottom: 15px;">
	          <form class="box" action="shipping.php" method="POST" enctype="multipart/form-data">
				<fieldset>
					<legend>Ship to Address</legend>
						<div class="form-group">
							<label for="first_name">First Name:</label>
							<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" value="<?php if ($_SESSION['fname'] != "") echo $_SESSION['fname'] ?>" >
						</div>
						<div class="form-group">
							<label for="last_name">Last Name:</label>
							<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" value="<?php if ($_SESSION['lname'] != "") echo $_SESSION['lname'] ?>">
						</div>
						<div class="form-group">
						  <label for="street">Street:</label>
						  <input type="text" class="form-control" id="street" placeholder="Enter Street" name="street" value="<?php if ($_SESSION['street'] != "") echo $_SESSION['street'] ?>">
						</div>
						<div class="form-group">
						  <label for="add2">Apt# or P.O. Box:</label>
						  <input type="text" class="form-control" id="add2" placeholder="Enter Apt# or P.O.Box" name="add2" value="<?php if ($_SESSION['add2'] != "") echo $_SESSION['add2'] ?>">
						</div>
						<div class="form-group">
						  <label for="city">City:</label>
						  <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="<?php if ($_SESSION['city'] != "") echo $_SESSION['city'] ?>">
						</div>
						<div class="form-group">
						  <label for="state">State:</label>
							  <select name="state">
								<?php if ($_SESSION['state'] != "") echo "<option selected='selected'>".$_SESSION['state']."</option>" ?>
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
							</select>	
						</div>
						<div class="form-group">
						  <label for="zip">Zip:</label>
						  <input type="text" class="form-control" id="zip" placeholder="Enter Zip" name="zip" value="<?php if ($_SESSION['zip'] != "") echo $_SESSION['zip'] ?>">
						</div>
						<div class="text-center" style="visibility:<?php echo $vis ?>;">
							<button type="submit" class="btn btn-success btn-md" name="submit">Submit</button>
						</div>
				</fieldset>
			  </form><!-- end index-form-->
		   </div><!-- end contact form-->
	</div>
	<div class="row col-sm-offset-3 col-sm-6" style="visibility:<?php echo $hide ?>;">
		<br>
		<div id="contact-form" style="background-color: #f8f8f8;padding-bottom: 15px;">
	          <form class="box" action="shipping.php" method="POST" enctype="multipart/form-data">
				<fieldset>
					<legend>Shipping Method</legend>
						<div class="form-group">
<?php	
						for ($i = 0; $i < $count; $i++){
							echo '<input type="radio" name="ship" value="'.$i.'"> '. $options[$i]['ServiceType']. " <sup>TM</sup>  &nbsp &nbsp".number_format($options[$i]['Amount'], 2).'<br>';
						}
?>						
						</div>
						<div class="text-center">
							<input class="btn btn-success" type="submit" name="go" value="GO!!">
						</div>
				</fieldset>
		  </form><!-- end index-form-->
	   </div><!-- end contact form--> 
	</div>

</content>

												<!--footer and script-->
<footer>
	<?php require('library/footer.php'); ?>
</footer>
<script type="text/javascript">
	var error = <?php echo $_SESSION['error'] ?>;
	
	if (error = true) {
		alert("The address entered is invalid. Please enter a valid address.");
	}
</script>
</body>
</html>