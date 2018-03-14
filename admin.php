<?php

	if( isset($_POST['submit1'])){
		$choice = 1;
	}else if (isset($_POST['submit2'])) {
		print_r("there");
	}

?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel ="stylesheet" href = "css\custom.css">
</head>
<body>
<header class="container">
	<div class="row">
		<div class="col-sm-2">
			<image src="images\BpLogo.JPG" alt="logo"></image>
		</div>
		<div class="col-sm-8 text-center">
			<b><h1>Berry Patch Admin</h1></b>
		</div>
	</div>
	
</header>
<content class="container">
	<div class="row">
		<div class="col-sm-offset-2 col-sm-10">
			<form action="newItem.php" method ="POST" enctype ="multipart/form-data">
				<legend>Shopping Page</legend>
				<input class="btn btn-success btnwide" type="submit" name="submit1" value="Add an item">
			</form>
			<form action="deleteItem.php" method ="POST" enctype ="multipart/form-data">
				<input class="btn btn-success btnwide" type="submit" name="submit1" value="Remove an item">
			</form>
		</div>
	</div>

</content>
<footer class="container">
	<div class="row">
		<div class="col-sm=6 col-sm-offset-2">

		</div>
	</div>
</footer>
</body>
</html>