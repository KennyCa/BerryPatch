<?php  
session_start();




$db_host = "localhost:3306";
$db_username = "root";
$db_pass = "BerryPatch5600#";
$db_name = "berrypatch";

$messagesw = false;

// call the register() function if register_btn is clicked
if (isset($_POST['register'])) {
	// connect to database
	$db = new mysqli ("$db_host","$db_username","$db_pass","$db_name")
	or die('Error connecting to mysql server.');

		
		
	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 
	register();
}



// REGISTER USER
function register(){

	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  $_POST['username'];
	$password_1  =  $_POST['password'];
	$password_2  =  $_POST['password2'];

	
	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database


		// start of my code
		$sql = "INSERT INTO `admin` (username, password) VALUES (?,?)";

		if($stmt = $db->prepare($sql)){
		if ($stmt->bind_param('ss', $username, $password ))
		$stmt->execute();
			//echo "executed<br>";

			$stmt->close();
			$db->close();
		}

			header('location: admin.php');				
		}
	
}





//login 

function login(){
		global $db, $messagesw, $message;
		$username = $_POST['username'];
    	$password = md5($_POST['password']);
    	$messagesw = false;
    	

		$sql = "SELECT password FROM `admin` WHERE username = ?";
				
				if ($stmt = $db->prepare($sql)) {
				} else {
				}
				$stmt->bind_param('s', $username);
				$stmt->execute();
				$stmt->store_result();		
				$stmt->bind_result($db_pw);
				$result = $stmt->fetch();




				if ($password == $db_pw){
					header('location: admin.php');
				} else {
					$message = "Invalid login. Please try again.";
					$messagesw = true;
				}
				$stmt->close();
				$db->close();	


}

?>