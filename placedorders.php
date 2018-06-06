<?php
require ("library/stamps.php");

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
	
	$sql = "SELECT cust_id, firstname, lastname, street, city, state, zip, zip4, O.order_num, order_date, ship_method, ship_cost, cc4, item_num, item, description, lbs, oz, qty, imagename, imagepath 
	FROM customer As C JOIN orders AS O ON (C.cust_id = O.customer_id) JOIN items AS I ON (o.order_num = I.order_num)
	WHERE printed = 'F'";
	
	if ($stmt = $conn->prepare($sql)) {
		$stmt->execute();
		$stmt->store_result();	
		$stmt->bind_result($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $ordernum, $odate, $ship, $shipcost, $cc4, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
		$stmt->fetch();
		$cid = $custid;
		$oid = $ordernum;

		//echo $cid."<br>";
		$ordered['customer'][$x] = PopCust($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $odate, $ship, $shipcost, $cc4);
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
					$ordered['customer'][$x] = PopCust($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $odate, $ship, $shipcost, $cc4);
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
				
				$ordered['customer'][$x] = PopCust($custid, $fname, $lname, $street, $city, $state, $zip, $zip4, $odate, $ship, $shipcost, $cc4);
				$ordered['customer'][$x]['items'][$y] = PopItem($ordernum, $itemnum, $item, $desc, $lbs, $oz, $qty, $iname, $ipath);
				$y++;
			}
			
		} 
		
		$stmt->close();
	}
	$conn->close();
	
	$xcount = count($ordered['customer']);
	//echo $xcount."<br>";
		
	//echo "<pre>";print_r($ordered);echo "</pre>";

	
	function PopCust ($cid, $fn, $ln, $s, $c, $st, $z, $z4, $od, $ship, $sc, $cc) {
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
	
	if (isset($_POST['submit'])) {
		
		$wsdl           = "https://swsim.testing.stamps.com/swsim/swsimv69.asmx?wsdl";
		$integrationID  = "6ccdfb3b-7ce6-49e5-94ff-e71b96792d04";
		$username       = "BerryPatch-001";
		$password       = "postage1";
		$ind = $_POST['ind'];
		$zip = $ordered['customer'][$ind]['zip'];
		$shipdate   = date('Y-m-d');
		$shipcost = $ordered['customer'][$ind]['shipcost'];
		$servtype = $ordered['customer'][$ind]['servicetype'];
		$label = false;
		
		$stamps     = new stamps_com($wsdl, $integrationID, $username, $password);
		
		foreach ($ordered['customer'][$ind]['items'] as $item) {
			$lbs += $item['lbs'];
		}
		

		$acc = $stamps->GetAccountInfo();
		//echo "<pre>";print_r($acc);echo "</pre>";
		$contot = $acc->AccountInfo->PostageBalance->ControlTotal;
		//echo $contot."<br>";
		
		switch ($servtype) {
		case "USPS Priority Mail":
			$st = "US-PM";
			break;
		case "USPS Priority Mail Express":
			$st = "US-XM";
			break;
		case "USPS Parcel Select":
			$st = "US-PS";
			break;
	}
		
		$postage = $stamps->PurchasePostage($shipcost, $contot);
		//echo "<pre>";print_r($postage);echo "</pre>";
		
		$to = new StdClass;
		$to->name = $ordered['customer'][$ind]['fname']." ".$ordered['customer'][$ind]['lname'];
		$to->address1 = $ordered['customer'][$ind]['street'];
		$to->address2 = ""; //$ordered['customer'][$ind][''];
		$to->city = $ordered['customer'][$ind]['city'];
		$to->state = $ordered['customer'][$ind]['state'];
		$to->zip = $ordered['customer'][$ind]['zip'];
		
		$result = $stamps->CreateIndicium($to, $shipcost, $servtype, $shipdate);
		//echo "<pre>";print_r($result);echo "</pre>";
		//echo $result['TrackingNumber'];
		if ($result) {
			$label = true;
			//echo "<br>".$ordered['customer'][$ind]['id']. " <br>".$ordered['customer'][$ind]['items'][0]['ordernum'];
			
			$user = "root"; 
			$password = ""; 
			$host = "localhost:3306"; 
			$dbase = "berrypatch";
			$printed = "T";
			
			// CONNECTING TO THE DATABASE
			$conn = new mysqli($host, $user, $password, $dbase);
			if (!$conn)
			{
			die ('Could not connect:' . $conn->connect_error);
			} 
			
			$sql = "UPDATE `orders` SET `tracking_num`= ?, `printed` = ?  WHERE customer_id = ? and order_num = ?";
			if ($stmt = $conn->prepare($sql)) {
				//echo "<br>Prepared<br>";
			}
			if ($stmt->bind_param('isii', $result['TrackingNumber'], $printed, $ordered['customer'][$ind]['id'], $ordered['customer'][$ind]['items'][0]['ordernum'])) {
				//echo "binded<br>";
			}
			if ($stmt->execute()) {
				//echo "Executed<br>";
				//echo "<pre>";print_r($ordered);echo "</pre>";
				array_splice($ordered['customer'], $ind, 1);
				//echo "<pre>";print_r($ordered);echo "</pre>";
				$xcount = count($ordered['customer']);
			}
						
			$stmt->close();
			$conn->close();
        }
	}
	
	//echo $label;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("library/head.php"); ?>
<title>Ordered Libary</title>
<?php require ("library/favicon.php"); ?>

</head>

                                <!-- **** SECTION BODY DISPLAY-->

<body onload="PrintLabel()" style="background-color: #FFFFCD;">

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
		echo "<br><br>";
		echo "<button id='".$i."' onClick='invoice(this.id)' class='btn btn-info btn-up po-btn'>Print Invoice</button>";
		echo "<br>";
		echo "<form action='placedorders.php' method='POST' enctype='multipart/form-data'>";
		echo "<input type='hidden' name='ind' value='".$i."'>";
		echo "<input class='btn btn-success btn-up po-btn' type='submit' name='submit' value='Print Label'>";
		echo "</form>";
		echo "</div>";
		echo "</div>";
	}
?>
</div>
                                        <!--SECTION ****: footer and script-->
    
    <?php require ("library/footer.php"); ?>


    <?php require("library/script.php");?>
<script type="text/javascript">
	function PrintLabel()
	{

		if (<?php echo $label ?> == 1){
		var url = "<?php echo $result['URL'] ?>"
		//alert(url);
		
			var printwindow = window.open(url);
			printwindow.document.close(); // necessary for IE >= 10
			printwindow.focus(); // necessary for IE >= 10*/

			printwindow.print();
			printwindow.close();
		}

	}
</script>

<script type="text/javascript">
	function invoice(clicked_id)
	{

		var mywindow = window.open('', 'PRINT', 'height=1000,width=600');
		
		mywindow.document.write('<html><header><h1> Berry Patch IT Services </h1>');
		mywindow.document.write('<p style="font-size:160%;">15330 Truman Street<br>Ottumwa, Iowa 52501</p>');
		mywindow.document.write('</header><body >');
		mywindow.document.write('<h1>' + document.title + '</h1>');
		mywindow.document.write('<h2>' + document.getElementById(clicked_id).innerHTML + '</h2>'); 
		mywindow.document.write('</body></html>');

		mywindow.document.close(); // necessary for IE >= 10
		mywindow.focus(); // necessary for IE >= 10*/

		mywindow.print();
		mywindow.close();

		return true;
	}
</script>

</body>
</html>
       