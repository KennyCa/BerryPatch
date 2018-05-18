<?php
	session_start();
	require ("library/stamps.php");
	$ordered = array();
	$messagesw = false;
	$message = "";
	
	if (isset($_POST['submit'])){
		$user = "root"; 
		$password = ""; 
		$host = "localhost:3306"; 
		$dbase = "berrypatch"; 
		$x = 0;
		$y = 0;
		
		// CONNECTING TO THE DATABASE
		$conn = new mysqli($host, $user, $password, $dbase);
		if (!$conn)
		{
		die ('Could not connect:' . $conn->connect_error);
		} 
		
		$radio = $_POST['key'];
		
		if ($radio == "all"){
			$sql = "SELECT cust_id, firstname, lastname, street, city, state, zip, zip4, O.order_num, order_date, ship_method, ship_cost, cc4, tracking_num, item_num, item, description, lbs, oz, qty, imagename, imagepath 
			FROM customer As C JOIN orders AS O ON (C.cust_id = O.customer_id) JOIN items AS I ON (o.order_num = I.order_num)";
			$stmt = $conn->prepare($sql);
	
		}
		if ($radio == "name"){
			$fname = "%{$_POST['fname']}%";
			$lname = "%{$_POST['lname']}%"; 
			$sql = "SELECT cust_id, firstname, lastname, street, city, state, zip, zip4, O.order_num, order_date, ship_method, ship_cost, cc4, tracking_num, item_num, item, description, lbs, oz, qty, imagename, imagepath 
			FROM customer As C JOIN orders AS O ON (C.cust_id = O.customer_id) JOIN items AS I ON (o.order_num = I.order_num)
			WHERE firstname LIKE ? and lastname LIKE ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('ss', $fname, $lname);
		}
		
		$stmt->execute();
		$stmt->store_result();	
		$stmt->bind_result($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $ordernum, $odate, $ship, $shipcost, $cc4, $tracking, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
		$stmt->fetch();
		$cid = $custid;
		$oid = $ordernum;

		//echo $cid."<br>";
		$ordered['customer'][$x] = PopCust($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $odate, $ship, $shipcost, $cc4, $tracking);
		$ordered['customer'][$x]['items'][$y] = PopItem($ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
		
		$y++;
		while($stmt->fetch()) {
			//echo $custid." ".$ordernum." ".$itemnum."<br>";
			if ($cid == $custid){
				if ($oid == $ordernum){
					$ordered['customer'][$x]['items'][$y] = PopItem($ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
				$y++;
				} else {
					$x++;
					$y = 0;
					$oid = $ordernum;
					$ordered['customer'][$x] = PopCust($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $odate, $ship, $shipcost, $cc4, $tracking);
					$ordered['customer'][$x]['items'][$y] = PopItem($ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
					$y++;
				}
				
			} else {
				$y =0;
			}
			if ($cid != $custid) {
				$cid = $custid;
				$oid = $ordernum;
				if ($y == 0) {
					$x++;
				}
				
				$ordered['customer'][$x] = PopCust($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $odate, $ship, $shipcost, $cc4, $tracking);
				$ordered['customer'][$x]['items'][$y] = PopItem($ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
				$y++;
			}
			
		} 
		
		$stmt->close();
		$conn->close();
		$xcount = count($ordered['customer']);
		$_SESSION['ordered'] = $ordered;
		$_SESSION['xcount'] = $xcount;
	}
	
	if (isset($_POST['track'])) {
	
		$ordered = $_SESSION['ordered'];
		$xcount = $_SESSION['xcount'];
		
		$wsdl           = "https://swsim.testing.stamps.com/swsim/swsimv69.asmx?wsdl";
		$integrationID  = "6ccdfb3b-7ce6-49e5-94ff-e71b96792d04";
		$username       = "BerryPatch-001";
		$password       = "postage1";
		$ind = $_POST['ind'];
		//echo "<pre>";print_r($ordered);echo "</pre>";
		//$tracknum = $ordered['customer'][$ind]['tracking'];
		//echo $tracknum;
		//$tracknum = "9405509699938463431058";  
		$tracknum = "9400111969000940000011";
		$stamps     = new stamps_com($wsdl, $integrationID, $username, $password);
		
		try {
			$track = $stamps->TrackShipment($tracknum);
			$message = '"<pre>";print_r($track);echo "</pre>"';
		} catch (exception $e){
			$message = $e->getMessage();
		}
		$messagesw = true;
	}
	
	
	function PopCust ($cid, $fn, $ln, $s, $c, $st, $z, $z4, $od, $ship, $sc, $cc, $tr) {
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
		$arr['orderdate'] = $od;
		$arr['servicetype'] = $ship;
		$arr['shipcost'] = $sc;
		$arr['cc4'] = $cc;
		$arr['tracking'] = $tr;
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
<title>starter page</title>
<?php require ("library/favicon.php"); ?>
</head>

                                <!-- **** SECTION BODY DISPLAY-->

<body onload="message()" style="background-color: #FFFFCD;">

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
                            <h2>.....</h2>
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
                        <div class="col-sm-offset-3 col-sm-6">
							<form action="search.php" method="POST" enctype ="multipart/form-data" style="margin:25px">
								<input type="radio" name="key" value="all" checked>Search all records<br>
								<input type="radio" name="key" value="name">Search by Name<br><br>
								First name: <input type="text" name="fname"><br><br>
								 Last name: <input type="text" name="lname"><br><br><br> 
								 <input class="btn btn-success btnwide" type="submit" name="submit" value="Submit">
							</form>
						</div>
                    </div>
                </div>
<div class="container container-fluid">
<?php
if ($ordered != null){
	for ($i =0; $i < $xcount; $i++){
		echo "<br><br>";
		echo "<div class='row shopborder' >";
		echo "<div class='page' id='".$i."'>";
		echo "<div class='col-sm-offset-1 col-sm-4 shopcontent'>";
		echo "<p><b>Customer ID:</b> ".$ordered['customer'][$i]['id']."</p>";
		echo "<p><b>Order Number:</b> ".$ordered['customer'][$i]['items'][0]['ordernum']."</p>";
		echo "<p><b>Name:</b> ".$ordered['customer'][$i]['fname']." ".$ordered['customer'][$i]['lname']."</p>";
		echo "<p><b>Address:</b></p>";
		echo "&nbsp&nbsp&nbsp".$ordered['customer'][$i]['street']."</p>";
		echo "&nbsp&nbsp&nbsp".$ordered['customer'][$i]['city'].",".$ordered['customer'][$i]['state']." ".$ordered['customer'][$i]['zip']. "-".$ordered['customer'][$i]['zip4']."</p>";
		echo "<p><b>OrderDate:</b> ".$ordered['customer'][$i]['orderdate']."</p>";
		echo "<p><b>Shipping Method:</b> ".$ordered['customer'][$i]['servicetype']."</p>";
		echo "<p><b>Shipping Cost:</b> ".$ordered['customer'][$i]['shipcost']."</p>";
		echo "<p><b>Credit Card Last 4:</b> ".$ordered['customer'][$i]['cc4']."</p>";
		echo "<p><b>Tracking Number:</b> ".$ordered['customer'][$i]['tracking']."</p>";
		echo "</div>";
		
		echo "<div id='".$i."' class='col-sm-4'>";
			foreach ($ordered['customer'][$i]['items'] as $item) {
				echo "<br>";
				echo "<p><b>Item Number:</b> ".$item['itemnum']."</p>";
				echo "<p><b>Item:</b> ".$item['item']."</p>";
				echo "<p><b>Description:</b> ".$item['desc']."</p>";
				echo "<p><b>Weight:</b> lbs:".$item['lbs']." ozs:".$item['oz']."</p>";
				echo "<p><b>Quantity:</b> ".$item['qty']."</p>";
				echo "<br>";
			}
		echo "</div>";
		echo "</div>";
		echo "<div class='col-sm-2'>";
			foreach ($ordered['customer'][$i]['items'] as $item) {
				echo "<img class='img-responsive po-img' src='".$item['ipath']."'";
				echo "<br><br><br><br>";
			}
		echo "</div>";
		echo "<div class='col-sm-1'>";
		echo "<br><br><br><br>";
		echo "<form action='search.php' method='POST' enctype='multipart/form-data'>";
		echo "<input type='hidden' name='ind' value='".$i."'>";
		echo "<input class='btn btn-success btn-up' type='submit' name='track' value='Track Package'>";
		echo "</form>";
		echo "</div>";
		echo "</div>";
	}
} else {
	echo "<h1>No records</h1>";
}
?>
</div>
                                        <!--SECTION ****: footer and script-->
    
    <?php require ("library/footer.php"); ?>


    <?php require("library/script.php");?>
<script type="text/javascript">
	function message()
	{
		if (<?php echo $messagesw ?> == 1){
			var message = "<?php echo $message ?>"
			alert(message);

		}
	}
</script>

</body>
</html>
       