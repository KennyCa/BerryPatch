<?php
    require_once 'braintree-php-3.29.0/lib/Braintree.php';

	session_start();
	$gateway = $_SESSION['gateway'];
	
    if (isset($_GET["id"])) {
        $transaction = $gateway->transaction()->find($_GET["id"]);
        $transactionSuccessStatuses = [
            Braintree\Transaction::AUTHORIZED,
            Braintree\Transaction::AUTHORIZING,
            Braintree\Transaction::SETTLED,
            Braintree\Transaction::SETTLING,
            Braintree\Transaction::SETTLEMENT_CONFIRMED,
            Braintree\Transaction::SETTLEMENT_PENDING,
            Braintree\Transaction::SUBMITTED_FOR_SETTLEMENT
        ];
        if (in_array($transaction->status, $transactionSuccessStatuses)) {
            $header = "Success!";
            $icon = "success";
            $message = "Your transaction has been successfully processed.";
			require ("library/process.php");
        } else {
            $header = "Transaction Failed";
            $icon = "fail";
            $message = "Your transaction has a status of " . $transaction->status;
        }
		//echo '<pre>'; print_r($gateway); echo '</pre>';
		//echo '<pre>'; print_r($transaction); echo '</pre>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>Transaction</title>
<?php require ("library/favicon.php"); ?>
</head>
<body>
               <nav id="myNavbar" class="navbar navbar-default navbar-inverse" role="navigation">
            <!-- grouping -->
            <div class="container-fluid">
                <div class="navbar-header col-sm-5" style="padding-bottom: 15px;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand col-sm-10" href="index.php"><i>Berry Patch IT Services and Computer Repair</i></a>
                </div>
                <!--collections Nav for toggle-->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">

                        <li><a href="index.php">HOME</a></li>
                        <li><a href="services.php">SERVICES</a></li>
                        <li><a href="shop.php">SHOP</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                        <li><a href="admin.php">ADMIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>

                <div class="container-fluid" style="background: linear-gradient( #ff3333, #262626); color: #ffffff; text-shadow: 2px 1px #000000;" >
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-sm-4 hidden-xs">
                            <br>
                            <br>
                            <br>
                              <img src="images/rvBpLogo.png" class="img-responsive img-rounded" alt="logo" width="100px" height="150px" >
                        </div>

                       

                       <div class="col-sm-4 text-center col-xs-12" style="padding-top: 50px;">
                            <br>
                            <br>
                            <h2>header wording goes here</h2>
                                <h3>
﻿                                    ****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 
                        </div>

                        <div class="col-sm-4">
            
                        </div>
                     </div>
                </div>

                <div class="container container-fluid">
                    <div class="row">
                       <div class="icon col-sm-offset-3 col-sm-6">
						<img src="/images/<?php echo($icon)?>.svg" alt=""><br>
						<h1><?php echo($header)?></h1><br>
						<section>
							<p><?php echo($message)?></p><br>
						</section>
						</div>
                    </div>
					<div class="row">
						
					</div>
                </div>
<!--footer-->
    
    <?php require ("library/footer.php"); ?>

<!--script-->
    <?php require("library/script.php");?>
	
<script>
	window.setTimeout(function() {
		window.location = 'index.php';
	  }, 3000);
</script>

</body>
</html>
       