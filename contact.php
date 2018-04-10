<?php
$page = "contact.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>Berry Patch Contact</title>
<?php require ("library/favicon.php"); ?>
</head>
<body>
               <?php require ("library/contactNav.php"); ?>

                <div class="container-fluid" style="background: linear-gradient( #ff3333, #262626); color: #ffffff; text-shadow: 2px 1px #000000;" >
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-sm-4">
                            <br>
                            <br>
                            <br>
                              <img src="images/rvBpLogo.png" class="img-responsive img-rounded" alt="logo" width="100px" height="150px" >
                        </div>

                       

                       <div class="col-sm-4 text-center" style="padding-top: 15px;">
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
       

                <div class="container-fluid" style="background-color: #f8f8f8;padding-bottom: 25px;">
                    <div class="row">
                        <div class="col-sm-6" style="box-shadow: 10px 10px 5px #b72a2a;">
                            <p style="padding-top: 25px;">Please fill out the form below with any questions or problems that you may be having. One of our techs will contact you and try to answer any questions or fix any problems.</p>

                        <?php require ("library/form.php"); ?>
                        </div>
                        <!--map-->
                        <div class="col-sm-6" style="box-shadow: 10px 10px 5px #b72a2a;">
                            
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.0736796868878!2d-92.43469508710203!3d41.10888211491939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87e61c208f99a511%3A0x8b2f666ebb1fc344!2sBerry+Patch+IT+Services!5e0!3m2!1sen!2sus!4v1520628756167" width="655" height="635" frameborder="0" style="border:0" allowfullscreen></iframe>
                     
                            
                        </div>
                    </div>
                </div>
            <!--footer-->
            <?php require ("library/footer.php"); ?>
      
<?php require ("library/script.php"); ?>     
</body>
</html>                            