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
<body style="background-color: #FFFFCD;">

      <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top role="navigation">
		<!-- grouping -->
		<div class="container">
			<div class="navbar-header col-sm-5" style="padding-bottom: 10px;">
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
					<li class="active"><a href="admin.php" >HOME</a></li>
					<li><a href="newitems.php">ITEM PAGE</a></li>
					<li><a href="#.php">ORDERS</a></li>
					<li><a href="index.php">MAIN MENU</a></li>
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
                            <h2>Admin</h2>
                                <h3>****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 
                        </div>

                        <div class="col-sm-4">

                        </div>
                     </div>
                </div>
       

<header class="container">
	<div class="row">
		
		<div class="col-sm-offset-2 col-sm-8 text-center">
			<b><h1>Berry Patch Admin</h1></b>
		</div>
	</div>
	
</header>
<content class="container">
	<div class="row">
		<div class="col-sm-offset-2 col-sm-10" style="padding-left: 30px">
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
<div class="container-fluid">
	
</div>


<?php require ("library/script.php"); ?>
</body>
</html>