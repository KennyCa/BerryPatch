<?php

$display = 0;

	if( isset($_POST['submit'])){
	
		$imagename = $_FILES["myimage"]["name"];
		$imagepath= "newitems/$imagename";
		$name = $_POST['name'];
		$description = $_POST['description'];
		$cost = $_POST['cost'];
		$itemarray = array();
		
		echo $name, $description, $cost;
		

		if (file_exists($imagepath)) {
			$display = 1;
		} else {
			$display = 2;
			$folder = "newitems/";
			move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);
			
		}	
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
		echo "File name already exist, Please rename file.";
	} else if ($display == 2){
		echo "File added Successfully";
	}
?>
		</div>
	</div>
</footer>
</body>
</html>