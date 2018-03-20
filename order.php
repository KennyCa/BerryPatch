<?php


$delind = -1;
$ind = 0;
$cartarray = array();
$itemarray = array();

	if (isset($_POST['review'])) {
		$cartarray = json_decode($_POST['ids']);
		echo '<pre>'; print_r($cartarray); echo '</pre>';
	}
	
	if (empty($itemarray)) {
		if (file_exists("library/itemarray.php")) {
			$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
			$ind = count($cartarray);
			echo $ind;
			$subtotal = calcsub($ind, $cartarray, $itemarray);

		}
	}
	
	if( isset($_POST['submit'])){
		$cartarray = json_decode($_POST['array']);
		$ind = $_POST['ind'];
		$subtotal = $_POST['sub'];
		$delind = $_POST['delind'];
		$minus = $_POST['cost'];
		array_splice($cartarray,$delind, 1);
		//file_put_contents('library/cartarray.php',json_encode($cartarray));
		$ind -= 1;
		$subtotal = calcsub($ind, $cartarray, $itemarray);
	}
	
	function calcsub ($in, $ca, $ia) {
		$sub = 0;
		for ($i = 0; $i < $in; $i++) {
			$sub += doubleval(preg_replace("/[^0-9.]/", "",$ia[$ca[$i]]['cost']));
		}
		return $sub ='$ ' . number_format($sub, 2);
	}
?>
<html>
<head>
<?php require ("library/head.php"); ?>
</head>
<body>
	<nav id="myNavbar" class="navbar navbar-default navbar-inverse role="navigation">
		<!-- grouping -->
		<div class="container">
			<div class="navbar-header col-sm-5 col-xs4" style="padding-bottom: 10px;">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand"><i>Berry Patch IT Services and Computer Repair</i></a>
			</div>
			<!--collections Nav for toggle-->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php" >HOME</a></li>
					<li><a href="services.php">SERVICES</a></li>
					<li class="active"><a href="shop.php">SHOP</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
					<li><a href="admin.php">ADMIN</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid" style="background: linear-gradient(#ce0f0f, #808080, #000000); color: #000000;" >
		<div class="row">
			<div class="col-sm-4" style="padding-top: 15px;">
				<br>
				<br>
				<br>
				  <img src="images/bp-logo.png" class="img-responsive img-rounded"  style="background-color: #dcdcdc;" alt="logo" width="80px" height="50px" >
			</div>

		   

			<div class="col-sm-4 text-center" style="padding-top: 15px;">
				
				<hr style="border-color: #000000; border-size: 2px"> 
				<h1>Review Order</h1>
			</div>
		</div>
	</div>
<content class="container">

<?php
	for ($i = 0; $i < $ind; $i++) {
		echo "<div class='row shopborder' >";
		echo "<div class='col-sm-2 col-sm-offset-1'>";
		echo "<form action='#' method='POST' enctype ='multipart/form-data'>";
		echo "<img src='".$itemarray[$cartarray[$i]]['imagepath']."' height='200' width='auto'><br>" ;
		echo "</div>";
		echo "<div class='col-sm-3 shopcontent'>";
		echo "<br><br><br>";
		echo "<p>Name: ".$itemarray[$cartarray[$i]]['name']."</p>";
		echo "<p>Description: ".$itemarray[$cartarray[$i]]['description']."</p>";
		echo "<p>Price: ".$itemarray[$cartarray[$i]]['cost']."</p>";
		echo "<p>Quantity: ".$itemarray[$cartarray[$i]]['qty']."</p>";
		echo "</div>";
		echo "<div class='btncenter col-sm-2'>";
		echo "<br><br><br><br>";
		echo "<input type='hidden' name='cost' value='".$itemarray[$cartarray[$i]]['cost']."'>";
		echo "<input type='hidden' name='sub' value='".$subtotal."'>";
		echo "<input type='hidden' name='ind' value =".$ind."'>";
		echo "<input type='hidden' name='imagepath' value='".$itemarray[$cartarray[$i]]['imagepath']."'>";
		echo "<input type='hidden' name='array' value='".json_encode($cartarray)."'>";
		echo "<input type ='hidden' name='delind' value='".$i."'><br><br>";
		echo "<input class='btn btn-success' type='submit' name='submit' value='Remove Item from Cart'>";
		echo "</div>";
		echo "</form>";
		echo "</div>";
	}
?>
	<div class="row">
		<div class="col-sm-2 col-sm-offset-7 text-center">
			<br><br><br>
			<p><b>Subtotal: </b><?php echo $subtotal; ?></p>
		</div>
	</div>
</content>
<footer>

</footer>
</body>
</html>