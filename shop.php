<?php
require ("library/item.php");

	if (file_exists("library/itemarray.php")) {
		$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
		$ind = count($itemarray);
	}
	
	if (isset($_POST['cart'])) {
		$item = $_POST['item'];
		$description = $_POST['description'];
		$price = $_POST['cost'];
		$imagepath = $_POST['image'];
		
		if (is_null($_POST['quantity'])) {
			$qty = 1;
		} else {
			$qty = $_POST['quantity'];
		}
		
		writeOrder($item, $description, $price, $imagepath, $qty);

	}
	
	function writeOrder ($n, $d, $c, $ip, $q) {
		$cartarray = array();
		$ind = 0;
		$cart = new item();
		$cart->setName($n);
		$cart->setDescription($d);
		$cart->setCost($c);
		$cart->setQty($q);
		$cart->setImagePath($ip);
		
		if (file_exists("library/cartarray.php")) {
			$cartarray = json_decode(file_get_contents("library/cartarray.php"), true);
			//print_r($cartarray);
			$ind = count($cartarray);
			$cartarray[$ind] = $cart; 
			//echo '<pre>'; print_r($cartarray); echo '</pre>';
			file_put_contents('library/cartarray.php',json_encode($cartarray));
		}
	}
	
	
	
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
	<link rel ="stylesheet" href = "css\bootstrap.css">
	<link rel ="stylesheet" href = "css\custom.css">
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
					<li><a href="shop.php">SHOP</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
					<li class="active"><a href="admin.php">ADMIN</a></li>
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
				<h1>SHOP</h1>
			</div>
		</div>
	</div>
<content class="container">
	
<?php
	for ($i = 0; $i < $ind; $i++) {
		echo "<div class='row shopborder' >";
		echo "<form action='shop.php' method='POST' enctype ='multipart/form-data'>";
		echo "<div class='col-md-2 col-sm-offset-1 ftleft'>";
		echo "<img src='".$itemarray[$i]['imagepath']."' height='200' width='auto'><br>" ;
		echo "<input type='hidden' name='image' value='".$itemarray[$i]['imagepath']."'>";
		echo "</div>";
		echo "<div class='col-sm-4 shopcontent'>";
		echo "<br><br><br>";
		echo "<p><b>Item:</b> ".$itemarray[$i]['name']."</p>";
		echo "<input type='hidden' name='item' value='".$itemarray[$i]['name']."'>";
		echo "<p><b>Description:</b> ".$itemarray[$i]['description']."</p>";
		echo "<input type='hidden' name='description' value='".$itemarray[$i]['description']."'>";
		echo "<p><b>Price:</b> ".$itemarray[$i]['cost']."</p>";
		echo "<input type='hidden' name='cost' value='".$itemarray[$i]['cost']."'>";
		if ($itemarray[$i]['qty'] > 1) {
			echo "<p><b>Quantity:</b> ";
			echo "<select name='quantity'>";
				for ($x = 0; $x <= $itemarray[$i]['qty']; $x++){
					echo "<option value='".$x."'>".$x."</option>";
				}
			echo "</select>";
		} else {
			echo "<p><b style='color:red'>1 Available</b></p>";
			echo "<input type='hidden' name='quantity' value=1>";
		}
		echo "</div>";
		echo "<div class='col-sm-1'>";
		echo "<br><br><br><br><br>";
		echo "<input class='btn btn-success' type='submit' name='cart' value='Add to Cart'>";
		echo "</div>";
		echo "</div>";
		echo "</form>";
		
	}
?>
		<br><br>
	<form action='order.php' method='POST' enctype ='multipart/form-data'>
		<div class="btncenter">
			<input class="btn btn-info" type="submit" name="review" value="Review Order">
		</div>
	</form>
</content>
<footer>

</footer>
</body>
</html>