<?php

if (isset($_POST['submit'])){
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$vistor_email = $_POST['email'];
$message = $_POST['comment'];


//Validate first
if  (empty($first_name)||empty($vistor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'tidelkai@gmail.com';//<== update the email address
echo 'here 1'
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $firstname.$last_name\n".
echo 'here 2'
    "Here is the message:\n $message".
    echo 'here 3'
$to = "tidelkai@gmail.com";//<== update the email address
$headers = "From: $email_from \r\n";
echo 'here 4'
$headers2 = "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers,$headers2);
echo 'here 5'
//done. redirect to thank-you page.
//header('Location: thankYou.php');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   }
?> 

