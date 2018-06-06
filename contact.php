<?php
$page = "contact.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->

            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118470737-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-118470737-1');
            </script>
<?php require ("library/head.php"); ?>
<meta name="Description" content="berry patch tech services, computer and device repair services contact information page and contact form">
<title>Berry Patch Contact</title>
<?php require ("library/favicon.php"); ?>
</head>

                         <!-- THREE SECTION BODY DISPLAY-->

<body style="background-color: #FFFFCD;">

                           <!--SECTION ONE: NAVIGATION AND HEADER-->

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
                        <li class="active"><a href="contact.php">CONTACT</a></li>
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
                              <img src="images/rvBpLogo.png" class="img-responsive img-rounded" alt="logo" width="100px" height="150px" >
                        </div>

                       

                       <div class="col-sm-4 text-center col-xs-12" style="padding-top: 50px;">
                            <br>
                            <br>
                            <h2>Contact Us</h2>
                                <h3>15330 Truman Street <br>
                                    Box 4<br>
                                    Ottumwa, Ia. 52501<br>
                                    Phone: (641) 683-5754<br>
﻿                                    ****</h3>
                           <hr style="border-color: #000000; border-size: 2px"> 
                        </div>

                        <div class="col-sm-4">
            
                        </div>
                     </div>
                </div>
                              <!--SECTION TWO: FORM AND MAP-->
                <div class="container-fluid" style="background-color: #f8f8f8;padding-bottom: 25px;">
                    <div class="row">
                        <div class="col-sm-6" style="box-shadow: 10px 10px 5px #b72a2a;">
                            <p style="padding-top: 25px;">Please fill out the form below with any questions or problems that you may be having. One of our techs will contact you and try to answer any questions or fix any problems.</p>

                        <?php require ("library/form.php"); ?>
                        </div>
                        
                        <!--map-->
                        <div class="col-sm-6" style="box-shadow: 10px 10px 5px #b72a2a;">
                            
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.0736796868878!2d-92.43469508710203!3d41.10888211491939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87e61c208f99a511%3A0x8b2f666ebb1fc344!2sBerry+Patch+IT+Services!5e0!3m2!1sen!2sus!4v1520628756167" width="100%" height="695" frameborder="0" style="border:0" allowfullscreen></iframe>                                                 
                        </div>
                    </div>
                </div>
                                                        <!-- SECTION THREE: FOOTER AND SCRIPT-->

<?php require ("library/footer.php"); ?>      
<?php require ("library/script.php"); ?>     
</body>
</html>                            