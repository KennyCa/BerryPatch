<?php
<<<<<<< HEAD:library/nav.php
echo '
        <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top role="navigation">
=======
    echo'
<<<<<<< HEAD:library/indexNav.php
        ';
=======
        <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
>>>>>>> 257f120188ecba6f1d78543434c3c6b5c6c05b63:library/indexNav.php
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

                        <li <?php if ($page == "index") echo "class=active" ?> ><a href="index.php">HOME</a></li>
                        <li <?php if ($page == "services") echo "class=active" ?> ><a href="services.php">SERVICES</a></li>
                        <li <?php if ($page == "shop") echo "class=active" ?> ><a href="shop.php">SHOP</a></li>
                        <li <?php if ($page == "about") echo "class=active" ?> ><a href="about.php">ABOUT</a></li>
                        <li <?php if ($page == "contact") echo "class=active" ?> ><a href="contact.php">CONTACT</a></li>
                        <li <?php if ($page == "admin") echo "class=active" ?> ><a href="admin.php">ADMIN</a></li>
                    </ul>
                </div>
            </div>
<<<<<<< HEAD:library/nav.php
        </nav>
	'	
?>
=======
        </nav>';
>>>>>>> 2b79d11c3fcdaf2c89701cedcde88d0f75b97d51:library/nav.php
?>

>>>>>>> 257f120188ecba6f1d78543434c3c6b5c6c05b63:library/indexNav.php
