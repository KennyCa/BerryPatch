<?php

	if (file_exists("library/itemarray.php")) {
		$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
		$ind = count($itemarray);
		session_start();
		$_SESSION['itemarray'] = $itemarray;
	}
	
?>
<html>
<head>
<?php require ("library/head.php"); ?>
<title>Shop</title>
<?php require ("library/favicon.php"); ?>
</head>
<body style="background-color: #FFFFCD;">
	<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top role="navigation">
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
					<li class="active"><a href="shop.php">SHOP</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
					<li><a href="admin.php">ADMIN</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid" style="background: linear-gradient( #ff3333, #262626); color: #ffffff; text-shadow: 2px 1px #000000;" >
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-sm-4 hidden-xs">
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
		echo "<button id='".$i."' onClick='reply_click(this.id)' class='btn btn-info btn-up'>Add to Cart</button>";
		echo "</div>";
		echo "</div>";
	}
?>
		<br><br>
	<form action='order.php' method='POST' enctype ='multipart/form-data'>
		<div class="btncenter">
			<input type="hidden" id="qtys" name="qtys">
			<input type = "hidden" id="ids" name="ids">
			<input class="btn btn-success" type="submit" name="review" value="Review Order">
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
<?php require ("library/script.php"); ?>
</body>
</html>