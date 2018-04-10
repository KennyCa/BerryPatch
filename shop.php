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
                            <h2>Shop</h2>
                                <h3>****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 
                        </div>

                        <div class="col-sm-4">

                        </div>
                     </div>
                </div>
       
<content class="container">
	
<?php
		
	for ($i = 0; $i < $ind; $i++) {
		echo "<div id='".$i."' class='row shopborder' >";
		//echo "<form id='".$i."' action='shop.php' method='POST' enctype ='multipart/form-data'>";
		echo "<div class=' col-xs-4 col-sm-2 col-sm-offset-1'>";
		echo "<img class='img-responsive' src='".$itemarray[$i]['imagepath']."' height='200' width='auto'>" ;
		//echo "<input type='hidden' name='image' value='".$itemarray[$i]['imagepath']."'>";
		echo "</div>";
		//echo "<div class='col-sm-9 ftright'>";
		echo "<div class='col-xs-6 col-sm-4 shopcontent'>";
		echo "<br><br><br>";
		echo "<p><b>Item:</b> ".$itemarray[$i]['name']."</p>";
		//echo "<input type='hidden' name='item' value='".$itemarray[$i]['name']."'>";
		echo "<p><b>Description:</b> ".$itemarray[$i]['description']."</p>";
		//echo "<input type='hidden' name='description' value='".$itemarray[$i]['description']."'>";
		echo "<p><b>Price:</b> ".$itemarray[$i]['cost']."</p>";
		//echo "<input type='hidden' name='cost' value='".$itemarray[$i]['cost']."'>";
		if ($itemarray[$i]['qty'] > 1) {
			echo "<p><b>Quantity:</b> ";
			echo "<select name='quantity'>";
				for ($x = 0; $x <= $itemarray[$i]['qty']; $x++){
					echo "<option value='".$x."'>".$x."</option>";
				}
			echo "</select>";
		} else {
			echo "<p><b style='color:red'>1 Available</b></p>";
			//echo "<input type='hidden' name='quantity' value=1>";
		}
		echo "</div>";
		echo "<div class='col-sm-1'>";
		echo "<br><br><br><br><br>";
		echo "<button id='".$i."' onClick='reply_click(this.id)' class='btn btn-success btn-up'>Add to Cart</button>";
		echo "</div>";
		echo "</div>";
		//echo "</div>";
		//echo "</form>";
		
	}
?>
		<br><br>
	<form action='order.php' method='POST' enctype ='multipart/form-data'>
		<div class="btncenter">
			<input type = "hidden" id="ids" name="ids">
			<input class="btn btn-info" type="submit" name="review" value="Review Order">
		</div>
	</form>
</content>
<footer>

</footer>
<script type="text/javascript">
	var divids = [];
function reply_click(clicked_id)
{
    var con = confirm("Item Added to Cart");
	if (con == true) {
	divids.push(clicked_id);
	json = JSON.stringify(divids);
	document.getElementById("ids").value = json;
	document.getElementById(clicked_id).style.display = "none";
	} 
}

</script>
<?php require ("library/script.php"); ?>
</body>
</html>