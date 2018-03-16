<?php

	if (file_exists("library/itemarray.php")) {
		$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
		$ind = count($itemarray);
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
<header class="container">
	<div class="row">
		<div class="col-sm-2">
			<image src="images\BpLogo.JPG" alt="logo"></image>
		</div>
		<div class="col-sm-8 text-center">
			<b><h1>Berry Patch Shop</h1></b>
		</div>
	</div>
	
</header>
<content class="container">
	<form action="#" method="POST" enctype ="multipart/form-data">
<?php
	for ($i = 0; $i < $ind; $i++) {
		echo "<div class='row shopborder' >";
		echo "<div class='col-sm-2 col-sm-offset-1 col-xs-7 '>";
		echo "<img src='".$itemarray[$i]['imagepath']."' height='200' width='auto'><br>" ;
		echo "</div>";
		echo "<div class='col-sm-7'>";
		echo "<br><br><br>";
		echo "<p>".$itemarray[$i]['name']."</p>";
		echo "<p>".$itemarray[$i]['description']."</p>";
		echo "<p>".$itemarray[$i]['cost']."</p>";
		echo "</div>";
		echo "</div>";
	}
?>
		<br><br>
		<div class="btncenter">
			<input class="btn btn-success" type="submit" name="submit" value="Review Order">
		</div>
	</form>
</content>
<footer>

</footer>
</body>
</html>