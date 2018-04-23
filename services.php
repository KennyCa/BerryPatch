<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>Services</title>
<?php require ("library/favicon.php"); ?>
</head>

<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top role="navigation">
    <!-- grouping -->
    <div class="container-fluid">
        <div class="navbar-header col-sm-5" style="padding-bottom: 15px;">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand col-sm-10" href="index.php"><i>Berry Patch IT Services and Computer Repair</i></a>
        </div>
        <!--collections Nav for toggle-->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">

                <li><a href="index.php">HOME</a></li>
                <li class="active"><a href="services.php">SERVICES</a></li>
                <li><a href="shop.php">SHOP</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="admin.php">ADMIN</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid" style="background-color: #8B0000;">
	<div class="row" style="padding-top:25px ">
		<div class="col-sm-6 text-center" style="padding-top: 75px; background-color: #E00000;color:#ffffff;">
			<h2>Services</h2>
				<p>
					Berry Patch IT Services in Ottumwa, Iowa offer any and all IT services you may need. We have great trained techs who have B.A. Degrees in Information Technology and continue training to keep up to date on the fast changing world of IT.<br>
				 
					We have listed a few of our most common services below. If you are having a problem and need some help, just give us a quick call or fill out the form on the Contact Us page and one of our techs will get in touch with you.
				</p>
				<br>
				<br>
		</div>
		<div class="col-sm-6">
			<?php require ("library/hire.php"); ?>
		</div>
	</div>
</div>	

<div class ="carousel">
	<div class ="container-fluid">
		<div class="row">
				<div class="col-sm-offset-3 col-sm-6">
					<div id="locations" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#locations" data-slide-to="car0" class="active"></li>
							<li data-target="#locations" data-slide-to="car1"></li>
							<li data-target="#locations" data-slide-to="car2"></li>
							<li data-target="#locations" data-slide-to="car3"></li>
							<li data-target="#locations" data-slide-to="car4"></li>
							<li data-target="#locations" data-slide-to="car5"></li>
							<li data-target="#locations" data-slide-to="car6"></li>
							
						</ol>
						<div class="carousel-inner" style="padding-right: 70px; padding-left: 70px; min-height: 150px">
							<div class="item active">
								<h3>Custom Computer builds</h3>
								<p>
									We have built more than a 100 custom PC's from simple personal systems to very large gaming systems, We use Intel and AMD. We can install Linux or Windows. 
								</p>
							</div>
							<div class="item">
								<h3>Computer Repair</h3>
								<p>
									Computer not running right? Give us a try! We can diagnose most PC problems and fix them.
									<br>  
								</p>
							</div>
							<div class="item">
								<h3>Computer Deployment Services</h3>
								<p>
									In need of new computers, We can help. We can build PC to your specs or deploy ones than you have gotten. We can also help in the search for what you need.
								</p>
							</div>
							<div class="item">
								<h3>Computer Data Recovery</h3>
								<p>
									Your PC die on you? Think you have lost all of your Information? Well maybe not! Bring your PC or drive to us and we can try and recover your data for you.
									<br> 
								</p>
							</div>
							<div class="item">
								<h3>Phone & Tablet Screen Replacement</h3>
								<p>
									Berry Patch IT Services now replaces screens on all devices phone or Tablets. Screens are ordered as needed and take 2-3 days to arrive. It takes about 2 hours to replace the screen. Contact us for an estimate.   
								</p>
							</div>
							<div class="item">
								<h3>Computer Recycling</h3>
									<p>
										Berry Patch IT Services offer recycling of old computers. We can erase or destroy the hard drive, which ever you prefer. We will come to your home or Business and pick up the equipment and recycle it properly. 
									</p>
							</div>



								
						<a class="left carousel-control" href="#locations" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#locations" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>  



<div class="row">
	<div class="container-fluid" style="background-color: #8B0000;">
		<div class="row">
			<div class="col-sm-4 hidden-xs" style="background-color: #ffffff; height: 100px;">
				<br>
				<br>
				<br>
			</div>
			<div class="col-sm-2 hidden-xs" style="height: 150px;">
				<br>
				<br>
				<br>
			</div>
			<div class="col-sm-6" style="background-color: #E00000; color: #ffffff; height: 140px;">
				<h3>We're here to help</h3>
				We know how intimidating your computer can be, so let us help. Why spend your day trying to solve your tech problems when one of our techs can get you online in no time? Call the Berry Patch IT Services in Ottumwa today with all of your computer needs!  Let us do the work so you can kick back and enjoy.
			</div>
		</div>	
	</div>
</div>

<!--footer-->
<?php require ("library/footer.php"); ?>


<script src="css/jquery-3.3.1.js"></script>
<!--<script src="js/jquery-2.1.4.min.js"></script> -->
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
