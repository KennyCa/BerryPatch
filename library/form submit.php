<?php
echo'
$fName= $_POST['first_name'] ;
$lName= $_POST['last_name'] ;
$email= $_POST['email'] ;
$phone= $_POST['phone'] ;
$time= $_POST['time'] ;
$comment= $_POST['comment'];
$from = 'From: Berry Patch IT';
$to= 'tiffany_baker@stu.indianhills.edu';
$subject = 'contact form info';

$body = " from: $first_name.last_name\n E-mail: $email \n Phone: $phone \n Time: $time \n Help needed: $comment";

if ($_POST['submit']) {
    if (mail ($to, $subject, $body, $from)) { 
        echo '<p>Your message has been sent!</p>';
    } else { 
        echo '<p>Something went wrong, go back and try again!</p>'; 
    }
}'
?>