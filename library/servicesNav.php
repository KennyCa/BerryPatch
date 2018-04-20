<?php
echo'
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
</nav>'
?>