<?php

	if (file_exists("library/itemarray.php")) {
		$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
		$ind = count($itemarray);
	}
$delind = -1;	
	if( isset($_POST['submit'])){
		$delind = $_POST['delind'];
		echo $delind;
		array_splice($itemarray,$delind, 1);
		file_put_contents('library/itemarray.php',json_encode($itemarray));
		$ind--;
		unlink($_POST['imagepath']);
	}
	echo '<pre>'; print_r($itemarray); echo '</pre>';
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
	<link rel ="stylesheet" href = "css\bootstrap.css">
	<link rel ="stylesheet" href = "css\custom.css">
	<title>Berry Patch Delete Item Page</title>
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
					<li class="active"><a href="index.php" >HOME</a></li>
					<li><a href="newItem.php">ITEM PAGE</a></li>
					<li><a href="#.php">ORDERS</a></li>
					<li><a href="admin.php">MAIN MENU</a></li>
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
				<h1>Remove Items From Shop</h1>
			</div>
		</div>
	</div>
<content class="container">
	
<?php
	for ($i = 0; $i < $ind; $i++) {
		echo "<div class='row shopborder' >";
		echo "<div class='col-sm-2 col-sm-offset-1'>";
		echo "<form action='#' method='POST' enctype ='multipart/form-data'>";
		echo "<img src='".$itemarray[$i]['imagepath']."' height='200' width='auto'><br>" ;
		echo "</div>";
		echo "<div class='col-sm-3'>";
		echo "<br><br><br>";
		echo "<p>Name: ".$itemarray[$i]['name']."</p>";
		echo "<p>Description: ".$itemarray[$i]['description']."</p>";
		echo "<p>Price: ".$itemarray[$i]['cost']."</p>";
		echo "<p>Quantity: ".$itemarray[$i]['qty']."</p>";
		echo "</div>";
		echo "<div class='btncenter col-sm-2'>";
		echo "<br><br><br><br>";
		echo "<input type='hidden' name='imagepath' value='".$itemarray[$i]['imagepath']."'>";
		echo "<input type ='hidden' name='delind' value='".$i."'><br><br>";
		echo "<input class='btn btn-success' type='submit' name='submit' value='Delete Item'>";
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