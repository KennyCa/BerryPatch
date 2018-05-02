<?php
//require_once 'braintree-php-3.29.0/lib/Braintree.php';
session_start();
$delind = -1;
$ind = 0;
$cartarray = array();
$qtyord = array();
$_SESSION['array'] = array();
$itemarray = $_SESSION['itemarray'];

	if (isset($_POST['review'])) {
		$cartarray = json_decode($_POST['ids']);
		$qtyord = json_decode($_POST['qtys']);
		$_SESSION['array'] = $cartarray;
		$_SESSION['qtyord'] = $qtyord;
		
		
	}
	
	if (empty($itemarray)) {
		if (file_exists("library/itemarray.php")) {
			$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
			
			//echo $ind;
			//echo '<pre>'; print_r($cartarray); echo '</pre><br>';
			//echo '<pre>'; print_r($qtyord); echo '</pre>';
		}
	}
	$ind = count($cartarray);
	$subtotal = calcsub($ind, $cartarray, $itemarray, $qtyord);
	calcweight($ind, $cartarray, $itemarray, $qtyord);
	
	if( isset($_POST['submit'])){
		$cartarray = json_decode($_POST['array']);
		$qtyord = json_decode($_POST['qtyarray']);
		$ind = $_POST['ind'];
		$subtotal = $_POST['sub'];
		$delind = $_POST['delind'];
		$minus = $_POST['cost']; 
		
		array_splice($cartarray,$delind, 1);
		array_splice($qtyord, $delind, 1);

		$ind -= 1;
		//echo '<pre>'; print_r($cartarray); echo '</pre><br>';
		//echo '<pre>'; print_r($qtyord); echo '</pre>';
		$_SESSION['array'] = $cartarray;
		$_SESSION['qtyord'] = $qtyord;
		$subtotal = calcsub($ind, $cartarray, $itemarray, $qtyord);
		calcweight($ind, $cartarray, $itemarray, $qtyord);
	}
	
	function calcsub ($in, $ca, $ia, $qo) {
		$sub = 0;
		for ($i = 0; $i < $in; $i++) {
			$sub += doubleval(preg_replace("/[^0-9.]/", "",$ia[$ca[$i]]['cost'])) * $qo[$i];
		}
		$_SESSION['subtotal'] = $sub;
		return $sub ='$ ' . number_format($sub, 2);
	}
	
	function calcweight ($in, $ca, $ia, $qo) {
		$weight = 0;
		$lbs = 0;
		$oz = 0;
		$_SESSION['lbs2'] = 0;
		$_SESSION['ozs2'] = 0;
		for ($i = 0; $i < $in; $i++) {
				$lbs += $ia[$ca[$i]]['lbs'] * $qo[$i];
				$oz += $ia[$ca[$i]]['oz'] * $qo[$i];
		}

		if ($oz >= 16) {
			$pd = floor($oz / 16);
			$oz =  $oz - ($pd * 16);
			$lbs += $pd;
		}
		
		if ($lbs > 69) {
			$max = 0;
			for ($i = 0; $i < $in; $i++) {
				$lb = $ia[$ca[$i]]['lbs'];
				if ($lb > $max){
					$max = $lb;
					$box = $i;
					
				}
			}
			$lbs -= $max;
			$oz -= $ia[$ca[$box]]['oz'];
			$_SESSION['lbs2'] = $ia[$ca[$box]]['lbs'];
			$_SESSION['ozs2'] = $ia[$ca[$box]]['oz'];
		}

		$_SESSION['lbs'] = $lbs;
		$_SESSION['ozs'] = $oz;

	}
?>
<html>
<head>
	<title>Berry Patch Order Page</title>
<?php require ("library/head.php"); ?>
<script src="https://js.braintreegateway.com/web/dropin/1.10.0/js/dropin.min.js"></script>
</head>
<body style="background-color: #FFFFCD;">
    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
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
                        <li class="active"><a href="shop.php">SHOP</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                        <li><a href="admin.php">ADMIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<body style="background-color: #FFFFCD;">


					<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top role="navigation">
					    
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

												<!--header banner-->

                 <div class="container-fluid" style="background: linear-gradient( #ff3333, #262626); color: #ffffff; text-shadow: 2px 1px #000000;" >
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-sm-4 col-xs-12">
                            <br>
                            <br>
                            <br>
                              <img src="images/rvBpLogo.png" class="img-responsive img-rounded" style="padding-top: 10px;" alt="logo" width="100px" height="150px" >
                        </div>
                       <div class="col-sm-4 text-center col-xs-12" style="padding-top: 50px;">
                            <br>
                            <br>
                            <h2>Review Order</h2>
                                <h3>****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 
                        </div>
                        <div class="col-sm-4">

                        </div>
                     </div>
                </div>

<content class="container">

<?php
	for ($i = 0; $i < $ind; $i++) {
		echo "<div class='row shopborder' >";
		echo "<div class='col-xs-4 col-sm-offset-1 col-sm-2'>";
		echo "<form action='#' method='POST' enctype ='multipart/form-data'>";
		echo "<img class='img-responsive' src='".$itemarray[$cartarray[$i]]['imagepath']."' height='200' width='auto'>" ;
		echo "</div>";
		echo "<div class='col-xs-6 col-sm-3 shopcontent'>";
		echo "<br><br><br>";
		echo "<p>Name: ".$itemarray[$cartarray[$i]]['name']."</p>";
		echo "<p>Description: ".$itemarray[$cartarray[$i]]['description']."</p>";
		echo "<p>Price: ".$itemarray[$cartarray[$i]]['cost']."</p>";
		echo "<p>Quantity: ".$qtyord[$i]."</p>";
		echo "</div>";
		echo "<div class='btncenter col-sm-2'>";
		echo "<br><br><br><br>";
		echo "<input type='hidden' name='cost' value='".$itemarray[$cartarray[$i]]['cost']."'>";
		echo "<input type='hidden' name='sub' value='".$subtotal."'>";
		echo "<input type='hidden' name='ind' value =".$ind."'>";
		echo "<input type='hidden' name='imagepath' value='".$itemarray[$cartarray[$i]]['imagepath']."'>";
		echo "<input type='hidden' name='array' value='".json_encode($cartarray)."'>";
		echo "<input type='hidden' name='qtyarray' value='".json_encode($qtyord)."'>";
		echo "<input type ='hidden' name='delind' value='".$i."'><br><br>";
		echo "<input class='btn btn-info btn-up' type='submit' name='submit' value='Remove Item from Cart'>";
		echo "</div>";
		echo "</form>";
		echo "</div>";
	}
?>
	<div class="row">
		<div class="col-sm-2 col-sm-offset-7 text-center">
			<br><br><br>
			<p><b>Subtotal: </b><?php echo $subtotal; ?></p><br><br>
		</div>
		
	</div>
	<div class="row text-center">
		<div class="col-sm-offset-4 col-sm-4" id="bt-dropin"></div>
	</div>
	<div class="row text-center">
		<form action="shipping.php" method="GET" enctype="multipart/form-data">
			<input type="hidden" name="array" value="<?php echo json_encode($cartarray); ?>">
			<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
			<input class="btn btn-success" type="submit" name="ship" value="Continue">
		</form>
	</div>
	<br><br><br>
</content>
<footer>

</footer>
<!--<script>
    var button = document.querySelector('#submit-button');
	var form = document.querySelector('#payment-form');
	var client_token = "<?php //echo($gateway->ClientToken()->generate()); ?>";

            braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
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
    </script> -->
</body>
</html>