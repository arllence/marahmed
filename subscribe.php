<?php
## CONFIG ##
# LIST EMAIL ADDRESS
$recipient = "bobiekings@gmail.com";

if(isset($_POST['submit'])) {
  $email = $_POST['email'];
  $time = date("h:i A");
  $date = date("l, F jS, Y");
  $url = $_SERVER['HTTP_HOST'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $body = "Message:\n\n$date at $time.\n\nIP Address.$ip \n\nE Address: $email\n\nUrl: $url ";


# SUBJECT (Subscribe/Remove)
$subject = "Subscribe";
# RESULT PAGE
$location = "index.html";
## FORM VALUES ##
# SENDER - WE ALSO USE THE RECIPIENT AS SENDER IN THIS SAMPLE
# DON'T INCLUDE UNFILTERED USER INPUT IN THE MAIL HEADER!
$sender = $recipient;
# MAIL BODY
//$body .= "email: ".$_REQUEST['email']." ";
# add more fields here if required
## SEND MESSGAE ##
mail( $recipient, $subject, $body, "From: $sender" ) or die ("Mail could not be sent.");
echo "<center><div id=\"formes\">Thank You</div></center>";
## SHOW RESULT PAGE ##
header( "Location: $location" );
}
?>