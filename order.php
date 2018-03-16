<?php

$subtotal = 0;

	if (file_exists("library/cartarray.php")) {
		$cartarray = json_decode(file_get_contents("library/cartarray.php"), true);
		$ind = count($cartarray);
		echo $ind."<br>";
		for ($i = 0; $i < $ind; $i++) {
			$subtotal += doubleval(preg_replace("/[^0-9.]/", "",$cartarray[$i]['cost']));
		}
		$subtotal ='$ ' . number_format($subtotal, 2);
		echo $subtotal."<br>";
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
		echo "<img src='".$cartarray[$i]['imagepath']."' height='200' width='auto'><br>" ;
		echo "</div>";
		echo "<div class='col-sm-3'>";
		echo "<br><br><br>";
		echo "<p>Name: ".$cartarray[$i]['name']."</p>";
		echo "<p>Description: ".$cartarray[$i]['description']."</p>";
		echo "<p>Price: ".$cartarray[$i]['cost']."</p>";
		echo "<p>Quantity: ".$cartarray[$i]['qty']."</p>";
		echo "</div>";
		echo "<div class='btncenter col-sm-2'>";
		echo "<br><br><br><br>";
		echo "<input type='hidden' name='imagepath' value='".$cartarray[$i]['imagepath']."'>";
		echo "<input type ='hidden' name='delind' value='".$i."'><br><br>";
		echo "<input class='btn btn-success' type='submit' name='submit' value='Remove Item from Cart'>";
		echo "</div>";
		echo "</form>";
		echo "</div>";
	}
?>
</content>
<footer>

</footer>
</body>
</html>