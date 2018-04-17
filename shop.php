<?php

	if (file_exists("library/itemarray.php")) {
		$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
		$ind = count($itemarray);

	}
	
?>
<html>
<head>
<?php require ("library/head.php"); ?>

</head>
<body>
	<?php require ("library/shopNav.php"); ?>

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
		echo "<div id='".$i."' class='row shopborder' >";
		echo "<div class=' col-xs-4 col-sm-2 col-sm-offset-1'>";
		echo "<img class='img-responsive' src='".$itemarray[$i]['imagepath']."' height='200' width='auto'>" ;
		echo "</div>";
		echo "<div class='col-xs-6 col-sm-4 shopcontent'>";
		echo "<br><br><br>";
		echo "<p><b>Item:</b> ".$itemarray[$i]['name']."</p>";
		echo "<p><b>Description:</b> ".$itemarray[$i]['description']."</p>";
		echo "<p><b>Price:</b> ".$itemarray[$i]['cost']."</p>";

		if ($itemarray[$i]['qty'] > 1) {
			echo "<p><b>Quantity:</b> ";
			echo "<select id='".$i."s' name='quantity'>";
				for ($x = 1; $x <= $itemarray[$i]['qty']; $x++){
					echo "<option value='".$x."'>".$x."</option>";
				}
			echo "</select>";
		} else {
			echo "<p><b style='color:red'>1 Available</b></p>";

		}
		echo "</div>";
		echo "<div class='col-sm-1'>";
		echo "<br><br><br><br><br>";
		echo "<button id='".$i."' onClick='reply_click(this.id)' class='btn btn-success btn-up'>Add to Cart</button>";
		echo "</div>";
		echo "</div>";
	}
?>
		<br><br>
	<form action='order.php' method='POST' enctype ='multipart/form-data'>
		<div class="btncenter">
			<input type="hidden" id="qtys" name="qtys">
			<input type = "hidden" id="ids" name="ids">
			<input class="btn btn-info" type="submit" name="review" value="Review Order">
		</div>
	</form>
</content>
<footer>

</footer>
<script type="text/javascript">
	var divids = [];
	var qtys = [];
function reply_click(clicked_id)
{
    var con = confirm("Item Added to Cart");
	if (con == true) {
				
		divids.push(clicked_id);
		json = JSON.stringify(divids);
		document.getElementById("ids").value = json;
		document.getElementById(clicked_id).style.display = "none";
		var e = document.getElementById(clicked_id + "s");
		var value = e.options[e.selectedIndex].value;
		qtys.push(value);
		json2 = JSON.stringify(qtys);
		document.getElementById("qtys").value = json2;
	} 
}

</script>
</body>
</html>