<?php
$pagetitle = "Home";
$page = "index.php";


if( isset($_POST['submit'])){

            $first_name= $_POST['first_name'];

            $last_name= $_POST['last_name'] ;
            $email= $_POST['email'] ;
            $phone= $_POST['phone'] ;
            $time= $_POST['time'] ;
            $comment= $_POST['comment'];
            $from = 'From: Berry Patch IT';
            $to= 'tiffany_baker@stu.indianhills.edu';
            $subject = 'contact form info';
            $human = $_POST['human'];


            $body = " from: $first_name.$last_name\n E-mail: $email \n Phone: $phone \n Time: $time \n Help needed: $comment";

       /*     if ($first_name != '' && $last_name != ''  && $email != '' && $phone != '') {
                if ($human == '6') {    
                    if (mail ($to, $subject, $body, $from)) { 
                        echo '<p>Your message has been sent!</p>';
                    } else { 
                        echo '<p>Something went wrong, go back and try again!</p>'; 
                        }
                } else {
                    echo '<p>You answered the anti-spam question incorrectly!</p>';
                }
            } else {
                echo '<p>You need to fill in all required fields!!</p>';
            }
        } else {
            echo "nope";*/
        } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>Berry Patch Home</title>
<?php require ("library/favicon.php"); ?>
</head>

<body>
<?php require ("library/indexNav.php"); ?>

<div class="jumbotron jumbotron-fluid" style="background-color: #dcdcdc; " >
        <h1 style="color: #ce0f0f; padding-top:10px;"><i>Berry Patch IT Services and Computer Repair</i></h1>
        <img src="images/bp-logo.png" class="img-responsive col-sm-1" style="background-color: #dcdcdc;" alt="logo">
        <br>
        <br>
        <p><i>"We Have A Passion For Technology!"</i></p>
</div>
<!--3 paagraph grid-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3" >
            <h2 style="color: #ff0000; text-shadow: 2px 1px #000000; ">Computer Problems?<br>
                    Need Computer Repair?<br>
                    Need a New or Used Computer?<br>
                    We are here to help you!<br></h2>
            <p>Call Us At: 641-683-5754 or 
                    641-777-4441.<br> 
                <i>Servicing Ottumwa and the 
                    surrounding area since 2016!</i></p>
        </div>
        <div class="col-sm-5" >
                <img class="img-responsive img-rounded" style="padding-right:20px ;" src="images/storeFrontSign.png"  alt="store">

        
        </div>
        <div class="col-sm-4">
            <br>
            <h2>Phone & Tablet Screen Replacement</h2>
        
                <p>Berry Patch IT Services now replaces screens on all devices phone or Tablets. Screens are ordered as needed and take 2-3 days to arrive. It takes about 2 hours to replace the screen. Contact us for an estimate.</p>  
        </div>
    </div>
</div>
    <hr>
    <!-- form and customer quote -->
    <div class="container-fluid" style="background-color: #f8f8f8;">
        <div class="row">
            <div class="col-sm-6 ">
                <h2 style="background-color: #f8f8f8;">Hire a Geek Today</h2>
                <?php require ("library/form.php"); ?> 
          
            </div>
            <div class="col-sm-6">
                <blockquote class="quote-box">
                  <h1><b>
                    “
                  </b></h1>
                  <p class="quote-text">
                    <i> It was a dark and stormy night and our 6 year old Dell crashed for the 20th time while I was desperately trying to print plane tickets. I had done everything possible to limp it along until I could save what I needed to off the dang thing. The 21st time it crashed, it was dead, dead, dead. In what my husband would later refer to as a fit of blinding rage, I dismantled that machine down to 50 itty bitty parts, a box and the hard drive. Only afterwards did I realize that now all of our contacts, tax information, photos, etc was gone. LUCKILY, I work with David's wife and she took the hard drive to David and in short order he saved all of my important items on a flash drive.</i> 
                  </p>
                  <hr>
                  <div class="blog-post-actions">
                    <p class="blog-post-bottom pull-left">
                      Joan H.<br>
                        Oskaloosa, Iowa
                    </p>
                  </div>
                </blockquote>
            </div>
        </div>
    </div>
    <br>
    <br>
    <!--footer-->
    
    <?php require ("library/footer.php"); ?>


</body>
</html>                   