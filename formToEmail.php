<?php  
if (!isset($_post['submit'])) {
	echo "error; you need to submit the form!";
}
$first_name= $_POST['first_name'];
$last_name= $_POST['last_name'] ;
$email= $_POST['email'] ;

if (empty($first_name||empty($email)) {
	echo "name and email are required";
	exit;
}

$from = 'tiffany_baker@stu.indianhills.edu';
$to = 'tiffany_baker@stu.indianhills.edu';
$subject = 'contact form info';
$headers = 'from $from \r\n'
$body = "this is a contact submission from: $first_name.$last_name\n E-mail: $email".

mail($to, $subject, $body, $from)


?>