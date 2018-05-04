<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>starter page</title>
<?php require ("library/favicon.php"); ?>
</head>

                                <!-- **** SECTION BODY DISPLAY-->

<body style="background-color: #FFFFCD;">

                            <!--SECTION ****: navigation and header banner-->

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
                        <li><a href="services.php">SERVICES</a></li>
                        <li><a href="shop.php">SHOP</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                        <li><a href="admin.php">ADMIN</a></li>
                    </ul>
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
                            <h2><?php echo $page ?></h2>
                                <h3>****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 

                        </div>

                        <div class="col-sm-4">
            
                        </div>

                     </div>
                </div>

                                                    <!--SECTION ****: -->

                <div class="container container-fluid">
                    <div class="row">
                        <p>content</p>
                        
                    </div>

                    <div class="row">
                        <div>
                            <p>goes</p>
                        </div> 

                        <div>
                            <p>here</p>
                        </div>
                        
                    </div>
                </div>
                                        <!--SECTION ****: footer and script-->
    
    <?php require ("library/footer.php"); ?>


    <?php require("library/script.php");?>

</body>
</html>
       