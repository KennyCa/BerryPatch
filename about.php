<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>About Us</title>
<?php require ("library/favicon.php"); ?>
</head>
<body style="background-color: #ffffff;">
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
                        <li class="active"><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                        <li><a href="admin.php">ADMIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>



<div class="container-fluid">
    <div class="row" style="padding-top: 30px;">
    <div class="row col-sm-8" style="background-color:#FFFFCD; box-shadow: 10px 10px 5px #8B0000; ">
        <div style="padding-top: 30px;">
            <br>
            <h1 style="text-align:center; padding-top:20px;"><b>About Us</b></h1>
        </div>
           <div style="padding-left: 20px;">
               <p>
                   Berry Patch IT Services is a small I.T. business in Ottumwa, Iowa. We have professionally trained techs in Information Technology. Our techs love everything to do with the Technology Industry and are always completing additional training so they are up to date on the latest changes in the industry. We are a computer repair service Ottumwa can count on. 
               </p>
           </div>
        <div class="text-center">
            <img class="img-responsive img-rounded" src="images/storeFront.jpg" width="600px" alt="store" >
        </div>
    </div>

        <div class="col-sm-4">
            <br>
            <?php require ("library/hire.php"); ?>

            <div class=" text-center" style="padding-left: 15px;"> 
                 <p>Ottumwa! If you have a computer question you need answered, just call us or send us an e-mail and we will give you the answer. We will answer all questions, from what is the best pc for you to how to use different software. If we don’t know the answer, we will find it and get back to you. </p>
                 <br>
                 <blockquote>
                    <i><b><h3 style="border-left-color: :none; text-shadow: -1px 0 #000000, 0 1px #000000, 1px 0 #000000, 0 -1px #000000; color:#8B0000">We are Ottumwa’s answer to computer needs and supplies.</h3></b></i>
                </blockquote>  
            </div>     
        </div>
    </div>
</div>
<div class="container container-fluid">
    <div class="row" style="padding-top:30px;">
        
    </div><!--end row-->
</div><!--end container-->

<!--footer-->
<?php require ("library/footer.php"); ?>

<?php require ("library/script.php"); ?>
</body>
</html>
