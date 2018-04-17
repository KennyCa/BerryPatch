<?php
require_once("braintree-php-3.29.0\lib\Braintree.php"); 

	$gateway = new Braintree_Gateway([
		'environment' => 'sandbox',
		'merchantId' => 'n25ndmrp554rhbwq',
		'publicKey' => 'rsj6qj2kf35rts5d',
		'privateKey' => '156d9b72cc8862cef320b1c701b41ab8'
	]);

	session_start();
	$_SESSION['gateway'] = $gateway;
	$cartarray = $_SESSION['array'];
	$qtyord = $_SESSION['qtyord'];
	$ind = count($cartarray);
	$taxrate = .07;
	$subtotal = $_SESSION['subtotal'];
	$lbs = 0;
	$ozs = 0;
	$options = $_SESSION['usps'];
	$opind = $_SESSION['uspsind'];
	
	if (file_exists("library/itemarray.php")) {
			$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
	}
	if ($_SESSION['state'] == "IA") {
		$tax = round($subtotal * $taxrate, 2, PHP_ROUND_HALF_UP);
	} else {
		$tax = 0;
	}

	$shipping = $options[$opind]['Amount'];
	$total = ($subtotal + $tax + $shipping);
?>
<html>
<head>
	<?php require('library/head.php'); ?>
</head>
<body>
	
<header>
	
</header>
<content class="container-fluid">
	<div class="row col-sm-offset-2 col-sm-6">
		<div id="contact-form" style="background-color: #f8f8f8;padding-bottom: 15px;">
	          <form class="box" id="payment-form" action="/checkout.php" method="POST" enctype="multipart/form-data">
				<fieldset>
					<legend>Your order</legend>
						<div class="form-group">
							<p>Name:&nbsp <b><?php echo $_SESSION['fname']. " ". $_SESSION['lname']; ?></b></p>
						</div>
						<div class="form-group">
							<p>Street: <b><?php echo $_SESSION['street']; ?></b></p>
						</div>
						<div class="form-group">
							<p>City: &nbsp&nbsp&nbsp<b><?php echo $_SESSION['city']; ?></b></p>
						</div>
						<div class="form-group">
							<p>State: &nbsp <b><?php echo $_SESSION['state']; ?></b></p>
						</div>
						<div class="form-group">
							<p>Zip: &nbsp&nbsp&nbsp&nbsp <b><?php echo $_SESSION['zip']; ?></b></p>
						</div>
						<div class="form-group">
							<label for="items">Items:</label>
							<?php
							for ($i = 0; $i < $ind; $i++) {
								echo "<div class='row shopborder' >";
								echo "<div class='col-xs-4 col-sm-offset-1 col-sm-2'>";
								echo "<img class='img-responsive' src='".$itemarray[$cartarray[$i]]['imagepath']."' height='200' width='auto'>" ;
								echo "</div>";
								echo "<div class='col-xs-6 col-sm-3 shopcontent'>";
								echo "<br>";
								echo "<p>Name: ".$itemarray[$cartarray[$i]]['name']."</p>";
								echo "<p>Description: ".$itemarray[$cartarray[$i]]['description']."</p>";
								echo "<p>Price: ".$itemarray[$cartarray[$i]]['cost']."</p>";
								echo "<p>Quantity: ".$qtyord[$i]."</p>";
								echo "</div>";
								echo "</div>";
						}	
						?>
						</div>
						<div class="form-group">
							<p>Subtotal: <?php echo $subtotal ?></p>
							<p>Tax: <?php echo $tax ?></p>
							<p>Shipping: <?php echo $shipping ?></p>
							<p>Total: <font color="red"><b><?php echo "$".$total ?></b></font></p>
							
						</div>
						<br><br>
						<div class="bt-drop-in-wrapper">
							<div id="bt-dropin"></div>
						</div>
						<br><br>
						<div class="text-center">
							<input type="hidden" name="amount" value=" <?php echo $total ?> ">
							<input id="nonce" name="payment_method_nonce" type="hidden" />
							<button class="btn btn-success" type="submit"><span>Buy Now</span></button>
						<!--	<button type="submit" class="btn btn-success btn-md" name="submit">Place Order</button> -->
						</div>
				</fieldset>
			  </form><!-- end index-form-->
		   </div><!-- end contact form-->
	</div>
</content>
<footer>
	<?php require('library/footer.php'); ?>
</footer>
    <script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script> 
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "<?php echo($gateway->ClientToken()->generate()); ?>";
        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          },
		  card: {
			cardholderName: true
		  }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }
              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script> 
    <script src="javascript/demo.js"></script> 
</body>
</html>