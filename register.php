<?php 
include('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>Register Login Page</title>
<?php require ("library/favicon.php"); ?>
</head>

                                <!-- three SECTION BODY DISPLAY-->

<body style="background-color: #FFFFCD;">

                            <!--SECTION one: navigation and header banner-->

        <nav id="myNavbar" class="navbar navbar-default navbar-inverse role="navigation">

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
                        <li><a href="services.php">SERVICES</a></li>
                        <li><a href="shop.php">SHOP</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                </div>
            </div>
        </nav>

                                                    <!--header banner-->

                <div class="container-fluid" style="background: linear-gradient( #ff3333, #262626); color: #ffffff; text-shadow: 2px 1px #000000;" >
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-sm-4 hidden-xs">
                            <br>
                            <br>
                            <br>
                              <img src="images/rvBpLogo.png" class="img-responsive img-rounded" alt="logo" width="100px" height="150px" >
                        </div> 

                       <div class="col-sm-4 text-center col-xs-12" style="padding-top: 50px;">
                            <br>
                            <br>
                            <h2></h2>
                                <h3>****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 

                        </div>

                        <div class="col-sm-4">
            
                        </div>

                     </div>
                </div>

                                                    <!--SECTION two: -->

                    <div class="container-fluid col-sm-12 text-center" style="padding-bottom: 20px;">
                        <div class="row">
                            <div class="register-box" id="register">
                                <img src="images/admin_profile.png" class="userPic">
                                <h1>Register User Here</h1>
                                    <form action="register.php" method="post" enctype="multipart/form-data">
                                       
                                        <p>Username:</p>
                                        <input style="padding-left: 10px;" type="text" name="username" placeholder="Enter Username">
                                        <p>Password:</p>
                                        <input style="padding-left: 10px;" type="password" name="password" placeholder="Enter Password">
                                        <p>Comfirm Password:</p>
                                        <input style="padding-left: 10px;" type="password" name="password2" placeholder="Enter Password Again">
                                        <br>
                                        <br>
                                        <input type="submit" name="register" value="register">   
                                    </form>
                            </div>
                        </div>   
                    </div>
                                        <!--SECTION three: footer and script-->
    
    <?php require ("library/footer.php"); ?>


    <?php require("library/script.php");?>

</body>
</html>