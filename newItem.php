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
<body style="background-color: #FFFFCD;">
       <?php require ("library/newItemNav.php"); ?>

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
                            <h2>New Items</h2>
                                <h3>****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 
                        </div>

                        <div class="col-sm-4">

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
				<label for="quantity">Lbs:</label><br>
				<input type ="text" name="lbs"><br><br>
				<label for="quantity">Ozs:</label><br>
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