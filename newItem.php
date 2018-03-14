<?php
require("library/item.php");


		$display = 0;
		$imagename;
		$tempname;
		$imagepath;
		$name;
		$description;
		$cost;
		

	if( isset($_POST['submit'])){
	
		$imagename = $_FILES["myimage"]["name"];
		$tempname = $_FILES["myimage"]["tmp_name"];
		$imagepath= "newitems/$imagename";
		$name = $_POST['name'];
		$description = $_POST['description'];
		$cost = $_POST['cost'];
		
		

		if (file_exists($imagepath)) {
			$display = 1;
		} else {
			$display = 2;
			//move();
			writeArray($name, $description, $cost, $imagename, $imagepath);
		}	
	}
	
	function move() {
		$folder = "newitems/";
		move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);
	}
	
	function writeArray($n, $d, $c, $in, $ip) {
		$itemarray = array();
		$array = array();
		$ind = 0;
		$item = new item();
		$item->setName($n);
		$item->setDescription($d);
		$item->setCost($c);
		$item->setImageName($in);
		$item->setImagePath($ip);
		
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
	

?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
	<script src="css/jquery-3.3.1.js"></script>
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
			<b><h1>Berry Patch</h1></b>
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