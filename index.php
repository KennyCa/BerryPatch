<?php
           
if (isset($_POST['login'])) {

    include('functions.php');
    // connect to database
    $db = new mysqli ("$db_host","$db_username","$db_pass","$db_name")
    or die('Error connecting to mysql server.');

        
        
    // variable declaration
    $username = "";
    $email    = "";
    $message  = "";
    $messagesw = false;
    $errors   = array(); 
    login();


}


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
<meta name="Description" content="berry patch tech services, computer and device repair services main index page"> 
    <title>Berry Patch IT Home</title>
    <?php require ("library/favicon.php"); ?>
</head>

                                    <!-- FOUR SECTION BODY DISPLAY-->

<body onload="message()" style="background-color: #FFFFCD;">
    

    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <!-- grouping -->

                                 <!--SECTION ONE: navigation and header banner-->


            <div class="container-fluid">
                <div class="navbar-header col-sm-5" style="padding-bottom: 15px;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <i><a class="navbar-brand col-sm-10" onclick="document.getElementById('login').style.display = 'block'">Berry Patch IT Services and Computer Repair</a></i>
                </div>

                                    <!--collections Nav for toggle-->

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">

                        <li class="active"><a href="index.php">HOME</a></li>
                        <li><a href="services.php">SERVICES</a></li>
                        <li><a href="shop.php">SHOP</a></li>  <!-- change to "shop.php" when finished -->
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul> 
                    <div class="fb-page" style="text-align: right;">
                     <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fberrypatchitservices%2F%3Fref%3Daymt_homepage_panel&tabs&width=340&height=70&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="270" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>   
                </div> 
            </div>
        </nav>

                                        <!--header banner-->

<div class="container-fluid" style="background: linear-gradient( #ff3333, #262626); padding-top:50px; color: #ffffff; text-shadow: -1px 0 #000000, 0 1px #000000, 1px 0 #000000, 0 -1px #000000;">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <img src="images/rvBpLogo.png" class="img-responsive img-rounded" style="padding-top: 10px;" alt="logo" width="100px" height="150px" >
        </div>
        <div class="hidden-sm hidden-md hidden-lg hidden-xl" style="padding-top:50px;">
            <h1 class="col-sm-10" style="padding-top: 30px; font-size: 35px; text-align: center;"><i>Berry Patch IT</i></h1>
            <br>
            <br>
        </div>
        <div class="hidden-xs" style="padding-top: 50px;">
            <h1 class="col-sm-10" style="padding-top: 30px; font-size: 52px;"><i>Berry Patch IT Services and Computer Repair</i></h1>
            <br>
                <br>
                <br>
                <br>
            <p style=" text-align: right; padding-right:150px;"><i>"We Have A Passion For Technology!"</i></p>
        </div>
    </div>
</div>
                                        
                                        <!--SECTION TWO: 3 paagraph grid-->

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3" >
            <h2 style="color: #8B0000; text-shadow: 1px 1px #000000; ">Computer Problems?<br>
                    Need Computer Repair?<br>
                    Need a New or Used Computer?<br>
                    We are here to help you!<br></h2>
            <p><b>Call Us At: 641-683-5754 or 
                    641-777-4441.<br> 
                <i>Servicing Ottumwa and the 
                    surrounding area since 2016!</i></b></p>
        </div>
        <div class="col-sm-5" >
                <img class="img-responsive img-rounded" style="padding-right:20px ;" src="images/storeFrontSign.png"  alt="storeFront">
        </div>
        <div class="col-sm-4">
            <br>
            <h2 style="color: #8B0000; text-shadow: 1px 1px #000000; ">Phone & Tablet Screen Replacement</h2>
        
                <p><b>Berry Patch IT Services now replaces screens on all devices phone or Tablets. Screens are ordered as needed and take 2-3 days to arrive. It takes about 2 hours to replace the screen. Contact us for an estimate.</b></p> 
        </div>           
    </div>
</div>

            <!-- SECTION THREE: form and customer quote -->

    <div class="container-fluid" style="background-color: #FFFFCD;">
        <div class="row">
            <div class="col-sm-6" style="background-color: #f8f8f8; box-shadow: 10px 10px 5px #b72a2a;">
                <h2 style="background-color: #f8f8f8;">Hire a Geek Today</h2>
                <?php require ("library/form.php"); ?> 
            </div>
            <div class="col-sm-1" style="background-color:#FFFFCD; width:2px;">
            </div>
            <div class="col-sm-5">
                  
                <blockquote style="border-left: none;">
                    <h1><b>“</b></h1>
                  <p>
                    <i> It was a dark and stormy night and our 6 year old Dell crashed for the 20th time while I was desperately trying to print plane tickets. I had done everything possible to limp it along until I could save what I needed to off the dang thing. The 21st time it crashed, it was dead, dead, dead. In what my husband would later refer to as a fit of blinding rage, I dismantled that machine down to 50 itty bitty parts, a box and the hard drive. Only afterwards did I realize that now all of our contacts, tax information, photos, etc was gone. LUCKILY, I work with David's wife and she took the hard drive to David and in short order he saved all of my important items on a flash drive.</i> 
                  </p>
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
<div class="container-fluid">
    <div class="row">
        <div class="login-box" id="login">
            <img src="images/avatar.png" class="avatar" alt="avatar">
            <h1>Login Here</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <p>Username</p>
                    <input style="padding-left: 10px;" type="text" name="username" placeholder="Enter Username">
                    <p>Password</p>
                    <input style="padding-left: 10px;" type="password" name="password" placeholder="Enter Password">
                    <input type="submit" name="login" value="Login"> 
                    <br>
                       <p style="text-align:right;"><small><a href="index.php">Dismiss</a></small></p>
                </form>
        </div>
    </div>   
</div>
        
    
                                <!--SECTION FOUR: footer and script-->
 
<?php require ("library/footer.php");?>

<?php require("library/script.php");?>



<script type="text/javascript">
        var login= document.getElementById('login');
        window.onclick = function(event){
            if (event.target == login){
                login.style.display = "none";
            }
        }

var frmvalidator  = new Validator("helpForm");
frmvalidator.addValidation("first_name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 

 $(document).ready(function() { Load(message()); })
</script>
<script type="text/javascript">
        function message() {

            
            if ( <?php echo $messagesw ?> == 1){
                var message = "<?php echo $message ?>";
                alert(message);
            }
        }
</script>
    

</body>
</html>