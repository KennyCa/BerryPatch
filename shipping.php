<?php
echo "here";

if (isset($_GET['ship'])) {
	session_start();
	$_SESSION['subtotal'] = $_GET['subtotal'];
	echo $_SESSION['subtotal'];
}
?>

