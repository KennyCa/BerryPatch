<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>Berry Patch Home</title>
<?php require ("library/favicon.php"); ?>
<style>
	.hidden{
		display: none;
	}
</style>

</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6" id="shipping-form">
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="fName">First Name:</label>
						<input type="text" class="form-control" id="fName" name="fName">
					</div>
					<div class="form-group col-sm-1">
						<label for="middle">M.I:</label>
						<input type="text" class="form-control" id="middle" name="middle">
					</div>
					<div class="form-group col-sm-4">
						<label for="lName">Last Name:</label>
						<input type="text" class="form-control" id="lName" name="lName">
					</div>
				</div>


				<div class="row">
					<div class="form-group col-sm-4">
						<label for="email">E-Mail:</label>
						<input type="text" class="form-control" id="email" name="email">
					</div>
					<div class="form-group col-sm-4 offset-col-4">
						<label for="phone">Phone:</label>
						<input type="text" class="form-control" id="phone" name="phone">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="street">Street:</label>
						<input type="text" class="form-control" id="street" name="street">
					</div>
					<div class="form-group col-sm-1">
						<label for= "apt" >Apt#:</label>
						<input type="text" class="form-control" id="apt" name="apt" placeholder="optional">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-4">
						<label for="city">City:</label>
						<input type="text" class="form-control" id="city" name="city">
					</div>

					<div class="form-group col-sm-1">
						<label for="st">State:</label>
						<input type="text" class="form-control" id="st" name="st">
					</div>
		
					<div class="form-group col-sm-3">
						<label for="zip">Zip Code:</label>
						<input type="text" class="form-control" id="zip" name="zip">
					</div>
				</div>
			</form>
		</div>
	</div>
	<hr>
				<div class="row">
					<div class= "col-sm-5">
						<label class="checkbox-inline" for="check">
  							<input type="checkbox" value="" name="checkbox" id="check" onclick="showHide"> Billing address different than shipping?
							</label>
					</div>
				</div>
				<br>

	<div class="row">
		<div class="billling-form">
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="fName" class="hidden">First Name:</label>
						<input type="text" class="form-control hidden" id="fName" name="fName">
					</div>
					<div class="form-group col-sm-1">
						<label for="middle" class="hidden">M.I:</label>
						<input type="text" class="form-control hidden" id="middle" name="middle">
					</div>
					<div class="form-group col-sm-4">
						<label for="lName" class="hidden">Last Name:</label>
						<input type="text" class="form-control hidden" id="lName" name="lName">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-4">
						<label for="email" class="hidden">E-Mail:</label>
						<input type="text" class="form-control hidden" id="email" name="email">
					</div>
					<div class="form-group col-sm-4 offset-col-4">
						<label for="phone" class="hidden">Phone:</label>
						<input type="text" class="form-control hidden" id="phone" name="phone">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="street" class="hidden">Street:</label>
						<input type="text" class="form-control hidden" id="street" name="street">
					</div>
					<div class="form-group col-sm-1">
						<label for= "apt"  class="hidden">Apt#:</label>
						<input type="text" class="form-control hidden" id="apt" name="apt" placeholder="optional">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-4">
						<label for="city" class="hidden">City:</label>
						<input type="text" class="form-control hidden" id="city" name="city">
					</div>

					<div class="form-group col-sm-1">
						<label for="st" class="hidden">State:</label>
						<input type="text" class="form-control hidden" id="st" name="st">
					</div>
		
					<div class="form-group col-sm-3">
						<label for="zip" class="hidden">Zip Code:</label>
						<input type="text" class="form-control hidden" id="zip" name="zip">
					</div>
				</div>
			</form>	
		</div>
	</div>
	<------------------------------------------------------------->

	<------------------------------------------------------------->
	<div class="row">
		<div class="col-sm-6" id="complete-ship-form">
	<hr>
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="fName">First Name:</label>
						<input type="text" class="form-control" id="fName" name="fName">
					</div>
					<div class="form-group col-sm-1">
						<label for="middle">M.I:</label>
						<input type="text" class="form-control" id="middle" name="middle">
					</div>
					<div class="form-group col-sm-4">
						<label for="lName">Last Name:</label>
						<input type="text" class="form-control" id="lName" name="lName">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-4">
						<label for="email">E-Mail:</label>
						<input type="text" class="form-control" id="email" name="email">
					</div>
					<div class="form-group col-sm-4 offset-col-4">
						<label for="phone">Phone:</label>
						<input type="text" class="form-control" id="phone" name="phone">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="street">Street:</label>
						<input type="text" class="form-control" id="street" name="street">
					</div>
					<div class="form-group col-sm-1">
						<label for= "apt" >Apt#:</label>
						<input type="text" class="form-control" id="apt" name="apt" placeholder="optional">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-4">
						<label for="city">City:</label>
						<input type="text" class="form-control" id="city" name="city">
					</div>

					<div class="form-group col-sm-1">
						<label for="st">State:</label>
						<input type="text" class="form-control" id="st" name="st">
					</div>
		
					<div class="form-group col-sm-3">
						<label for="zip">Zip Code:</label>
						<input type="text" class="form-control" id="zip" name="zip">
					</div>
				</div>
				<div class="row">
					<fieldset>
						<legend><small>FOR OFFICE USE ONLY</small></legend>
						<div class="form-group col-sm-3">
							<label for="order">Order Number:</label>
							<input type="text" class="form-control" id="order" name="order">
						</div>
						<div class="form-group col-sm-3">
							<label for="filled">Date Fulfilled:</label>
							<input type="text" class="form-control" id="zip" name="zip">
						</div>
						<div class="form-group col-sm-3">
							<label for="confirm">Comfirmation#:</label>
							<input type="text" class="form-control" id="confirm#" name="confirm#">
					</fieldset>
					</div>
				</div>
				</div>
			</form>
		</div>	
	</div>
</div>





<script type="text/javascript" src="jquery-3.3.1.js">
	function showHide(){
		var checkbox = document.getElementById ("check");
		var hiddeninputs = document.getElementByClassName ("hidden");

		for (var i = 0; i != hiddeninputs.length; i++){
			if (checkbox.checked) {
				hiddeninputs[i].style.display= "block";
			}
			else{
				hiddeninputs[i].style.display="none";
			}
		}
		
	}
</script>	
</body>
</html>