<?php
	$page = "Orders to be Shipped";
	$user = "root"; 
	$password = ""; 
	$host = "localhost:3306"; 
	$dbase = "berrypatch"; 
	$ordered['customer'] = array();
	$custid = 0;
	$fname = "";
	$lname = "";
	$street = "";
	$city = "";
	$state = "";
	$zip = 0;
	$zip4 = 0;
	$ordernum = 0;
	$itemnum = 0;
	$item = "";
	$lbs = 0;
	$oz = 0;
	$qty = 0;
	$iname = "";
	$ipath = "";
	$x = 0;
	$y = 0;
	
	// CONNECTING TO THE DATABASE
 	$conn = new mysqli($host, $user, $password, $dbase);
	if (!$conn)
	{
	die ('Could not connect:' . $conn->connect_error);
	} 
	mysqli_set_charset($conn, "utf8");
	
	$sql = "SELECT cust_id, firstname, lastname, street, city, state, zip, zip4, O.order_num, item_num, item, description, lbs, oz, qty, imagename, imagepath 
	FROM customer As C JOIN orders AS O ON (C.cust_id = O.customer_id) JOIN items AS I ON (o.order_num = I.order_num)
	WHERE printed = 'F'";
	
	if ($stmt = $conn->prepare($sql)) {
		$stmt->execute();
		$stmt->store_result();	
		$stmt->bind_result($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
		$stmt->fetch();
		$cid = $custid;
		$oid = $ordernum;
		$iid = $itemnum;
		//echo $cid."<br>";
		$ordered['customer'][$x] = PopCust($custid, $fname, $lname, $street, $city, $state, $zip, $zip4);
		$ordered['customer'][$x]['items'][$y] = PopItem($ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
		
		$y++;
		while($stmt->fetch()) {
			//echo $custid." ".$ordernum." ".$itemnum."<br>";
			if ($cid == $custid){
				$ordered['customer'][$x]['items'][$y] = PopItem($ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
				$y++;
			} else {
				$y =0;
			}
			if ($cid != $custid) {
				$cid = $custid;
				if ($y == 0) {
					$x++;
				}
				
				$ordered['customer'][$x] = PopCust($custid, $fname, $lname, $street, $city, $state, $zip, $zip4);
				$ordered['customer'][$x]['items'][$y] = PopItem($ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
				$y++;
			}
			
		} 
		
		$stmt->close();
	}
	$conn->close();
	
	$xcount = count($ordered['customer']);
	//echo $xcount."<br>";
		
	echo "<pre>";print_r($ordered);echo "</pre>";

	
	function PopCust ($cid, $fn, $ln, $s, $c, $st, $z, $z4) {
		$x = 0;
		//echo $cid." <br>".$fn." <br>".$ln." <br>".$s." <br>".$c." <br>".$st." <br>".$z." <br>".$z4." <br>";
		$arr['id'] = $cid;
		$arr['fname'] = $fn;
		$arr['lname'] = $ln;
		$arr['street'] = $s;
		$arr['city'] = $c;
		$arr['state'] = $st;
		$arr['zip'] = $z;
		$arr['zip4'] = $z4;
		$x++;
		return $arr;
	}
	
	function PopItem ($o, $i, $item, $d, $lbs, $oz, $qty, $in, $ip) {
		$arr['ordernum'] = $o;
		$arr['itemnum'] = $i;
		$arr['item'] = $item;
		$arr['desc'] = $d;
		$arr['lbs'] = $lbs;
		$arr['oz'] = $oz;
		$arr['qty'] = $qty;
		$arr['iname'] = $in;
		$arr['ipath'] = $ip;
		return $arr;
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>Ordered Libary</title>
<?php require ("library/favicon.php"); ?>
</head>

                                <!-- **** SECTION BODY DISPLAY-->

<body style="background-color: #FFFFCD;">

                            <!--SECTION ****: navigation and header banner-->

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
<?php
	for ($i =0; $i < $xcount; $i++){
		echo "<div id='".$i."' class='row shopborder' >";
		echo "<div class='col-sm-offset-1 col-sm-4 shopcontent'>";
		echo "<p><b>Customer ID:</b> ".$ordered['customer'][$i]['id']."</p>";
		echo "<p><b>Order Number:</b> ".$ordered['customer'][$i]['items'][0]['ordernum']."</p>";
		echo "<p><b>Name:</b> ".$ordered['customer'][$i]['fname']." ".$ordered['customer'][$i]['lname']."</p>";
		echo "<p><b>Address:</b></p>";
		echo "&nbsp&nbsp&nbsp".$ordered['customer'][$i]['street']."</p>";
		echo "&nbsp&nbsp&nbsp".$ordered['customer'][$i]['city'].",".$ordered['customer'][$i]['state']." ".$ordered['customer'][$i]['zip']. "-".$ordered['customer'][$i]['zip4']."</p>";
		echo "</div>";
		echo "<div class='col-sm-4'>";
			foreach ($ordered['customer'][$i]['items'] as $item) {
				echo "<p><b>Item Number:</b> ".$item['itemnum']."</p>";
				echo "<p><b>Item:</b> ".$item['item']."</p>";
				echo "<p><b>Description:</b> ".$item['desc']."</p>";
				echo "<p><b>Weight:</b> lbs:".$item['lbs']." ozs:".$item['oz']."</p>";
				echo "<p><b>Quantity:</b> ".$item['qty']."</p>";
				echo "<div class='col-sm-2'>";
				echo "<img class='img-responsive' src='".$item['ipath']."' height='100' width='auto'>" ;
				echo "</div>";
			}
		echo "</div>";
		echo "<div class='col-sm-1'>";
		echo "<br><br><br><br><br>";
		echo "<button id='".$i."' onClick='reply_click(this.id)' class='btn btn-info btn-up'>Add to Cart</button>";
		echo "</div>";
		echo "</div>";
	}
?>
</div>
                                        <!--SECTION ****: footer and script-->
    
    <?php require ("library/footer.php"); ?>


    <?php require("library/script.php");?>

</body>
</html>
       