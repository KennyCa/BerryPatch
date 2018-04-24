<?php
            


require("library/formToEmail.php");

$page = "index";

$pagetitle = "Home";

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


if (isset ($_POST['login'])){
    $un = $_POST['username'];
    $pw = $_POST['password'];
    echo 'here';
}

?>
                        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="Content-type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <link rel ="stylesheet" href = "css\bootstrap.css">
    <link rel ="stylesheet" href = "css\custom.css">
    <link rel ="stylesheet" href = "css\style.css"> 
    <title>Berry Patch Home</title>
<?php require ("library/favicon.php"); ?>
</head>

                                    <!-- FOUR SECTION BODY DISPLAY-->

<body style="background-color: #FFFFCD;">

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
                        <li><a href="shop.php">SHOP</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                        <li><a href="admin.php">ADMIN</a></li>
                    </ul>
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
                <img class="img-responsive img-rounded" style="padding-right:20px ;" src="images/storeFrontSign.png"  alt="store">
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
                <?php require ("library/form submit.php"); ?> 
            </div>
            <div class="col-sm-5" style="background-color: #FFFFCD; padding-left:25px;">
            <div class="col-sm-1" style="background-color:#FFFFCD; width:2px;">
            </div>
            <div class="col-sm-5">
                <blockquote class="quote-box">
                <blockquote style="border-left: none;">
                  <h1><b>
                    “
                  </b></h1>
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
            <img src="images/avatar.png" class="avatar">
            <h1>Login Here</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">>
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password">
                <input type="submit" name="login" value="Login">
                <a href="#">Forget Password</a>    
                </form>
        </div>
    </div>   
</div>
        
    
                                <!--SECTION FOUR: footer and script-->
 
    <?php require ("library/footer.php"); ?>

<?php require("library/script.php");?>
<script>
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
</script>
    

</body>
</html>