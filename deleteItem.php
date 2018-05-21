<?php

	if (file_exists("library/itemarray.php")) {
		$itemarray = json_decode(file_get_contents("library/itemarray.php"), true);
		$ind = count($itemarray);
	}
$delind = -1;	
	if( isset($_POST['submit'])){
		$delind = $_POST['delind'];
		//echo $delind;
		array_splice($itemarray,$delind, 1);
		file_put_contents('library/itemarray.php',json_encode($itemarray));
		$ind--;
		unlink($_POST['imagepath']);
	}
	//echo '<pre>'; print_r($itemarray); echo '</pre>';
?>
<html>
<head>
	<?php require ("library/head.php"); ?>
	<title>Berry Patch Delete Item Page</title>
	<?php require ("library/favicon.php"); ?>

</head>

													<!--THREE SECTION BODY DISPLAY-->
<body style="background-color: #FFFFCD;">

												<!--SECTION PONE: NAVIGATION AND HEADER-->

				<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top role="navigation">
				    									
				    									<!-- grouping -->

				    <div class="container-fluid">
				        <div class="navbar-header" style="padding-bottom: 5px;">
				            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>
				            <a class="navbar-brand col-sm-10 col-xs-10" href="#.php"><i>Berry Patch IT Services Admin Bar</i></a>
				        </div>
				       
				       								 <!--collections Nav for toggle-->

				        <div class="collapse navbar-collapse" id="navbarCollapse">
				            <ul class="nav navbar-nav">
				                <li><a href="index.php">HOME</a></li>
				                <li><a href="newitem.php">ITEM PAGE</a></li>
				                <li><a href="#.php">ORDERS</a></li>
				                <li class="active"><a href="admin.php">ADMIN</a></li>
				            </ul>
				        </div>
				    </div>
				</nav>
													<!--HEADER AND BANNER-->

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
                            <h2>Remove Item From Shop</h2>
                                <h3>****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 
                        </div>

                        <div class="col-sm-4">

                        </div>
                     </div>
                </div>

                									<!--SECTION TWO: DELETE ITEM CONTENT-->
       
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

											<!-- SECTION THREE: FOOTER AND SCRIPT-->

<footer>
	
</footer>
</body>
</html>