<?php
require("library/item.php");


		$display = 0;
		$imagename;
		$tempname;
		$imagepath;
		$name;
		$description;
		$cost;
		$forcost;
		

	if( isset($_POST['submit'])){
	
		$imagename = $_FILES["myimage"]["name"];
		$tempname = $_FILES["myimage"]["tmp_name"];
		$imagepath= "newitems/$imagename";
		$name = $_POST['name'];
		$description = $_POST['description'];
		$cost = asDollars(doubleval($_POST['cost']));
		$quantity = $_POST['quantity'];
		$lbs = $_POST['lbs'];
		$oz = $_POST['ozs'];
		

		if (file_exists($imagepath)) {
			$display = 1;
		} else {
			$display = 2;
			move();
			writeArray($name, $description, $cost, $imagename, $imagepath, $quantity, $lbs, $oz);
		}	
	}
	
	function move() {
		$folder = "newitems/";
		move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);
	}
	
	function writeArray($n, $d, $c, $in, $ip, $q, $l, $o) {
		$itemarray = array();
		$ind = 0;
		$item = new item();
		$item->setName($n);
		$item->setDescription($d);
		$item->setCost($c);
		$item->setQty($q);
		$item->setImageName($in);
		$item->setImagePath($ip);
		$item->setLbs($l);
		$item->setOzs($o);
		
		if (file_exists("library/itemarray.php")) {
			$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
			//print_r($itemarray);
			$ind = count($itemarray);
			$itemarray[$ind] = $item; 
			//echo '<pre>'; print_r($itemarray); echo '</pre>';
			file_put_contents('library/itemarray.php',json_encode($itemarray));
		} else {
			$display = 3;
		}
		
	}
	
	function asDollars ($num) {
		$money = '$ ' . number_format($num, 2);
		return $money;
	}
	
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="css/jquery-3.3.1.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/customAdmin.css">
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
				<h1>Add Items To Shop</h1>
			</div>
		</div>
	</div>
<content class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-2">
			<form action="newItem.php" method="POST" enctype ="multipart/form-data">
				<label for="i2">Select Picture to upload:</label>
				<input class="btn btn-success" id="image" name="myimage" type="file"><br>
				<label for="name">Name:</label><br>
				<input type ="text" name="name"><br><br>
				<label for="description">Description:</label><br>
				<input type ="text" name="description"><br><br>
				<label for="cost">Cost:</label><br>
				<input type ="text" name="cost"><br><br>
				<label for="quantity">Quantity:</label><br>
				<input type ="text" name="quantity"><br><br>
				<h5><b>Weight</b></h5><br>
				<label for="lbs">Lbs:</label><br>
				<input type ="text" name="lbs"><br><br>
				<label for="ozs">Ozs:</label><br>
				<input type ="text" name="ozs"><br><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
</content>
<footer class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
<?php
	if ($display == 1) {
		echo '<p class="message">File name already exist, Please rename file.</p>';
	} else if ($display == 2){
		echo '<p class="message">File added Successfully.</p>';
	} else if ($display == 3) {
		echo '<p class="message">File itemarray.php not found.</p>';
	}
?>
		</div>
	</div>
</footer>
</body>
<script>
	$('.message').delay(3000).fadeOut('slow',function() { $(this).remove(); });
</script>
</html>