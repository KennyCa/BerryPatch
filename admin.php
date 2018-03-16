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

                <nav id="myNavbar" class="navbar navbar-default navbar-inverse role="navigation">
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
                                <li><a href="shop.php">SHOP</a></li>
                                <li><a href="about.php">ABOUT</a></li>
                                <li><a href="contact.php">CONTACT</a></li>
								<li class="active"><a href="admin.php">ADMIN</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

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
							<h1>ADMIN</h1>
                        </div>
					</div>
				</div>

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