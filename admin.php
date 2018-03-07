<?php
$choice = 0;

$new_item = '<form action="admin.php" method="POST" enctype ="multipart/form-data">
				<label for="i2">Select Picture to upload:</label>
				<input id="image" name="myimage" type="file"><br>
				<label for="name">Name:</label>
				<input type ="text" name="name"><br>
				<label for="description">Description:</label>
				<input type ="text" name="description"><br>
				<label for="cost">Cost:</label>
				<input type ="text" name="cost"><br>
				<input type="submit" name="submit2" value="submit">
			</form>';
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
	<link rel="stylesheet" href="css/customAdmin.css">
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
			<form action="admin.php" method ="POST" enctype ="multipart/form-data">
				<legend>Shopping Page</legend>
				<input type="submit" name="submit1" value="New item">
			</form>
		</div>
	</div>

</content>
<footer class="container">
	<div class="row">
		<div class="col-sm=6 col-sm-offset-2">
<?php

	if ($choice == 1)
		echo $new_item;
	
?>
		</div>
	</div>
</footer>
</body>
</html>