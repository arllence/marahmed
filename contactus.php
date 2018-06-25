<?php
#######################################
$email = 'bobiekings@gmail.com';##########
?>
<!--link to php-->
<head>
<SCRIPT LANGUAGE="JavaScript">
function checkEmail(ccForm) {
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(ccForm.jemail.value)){
return (true)
}
alert("Invalid E-mail Address! Please re-enter.")
return (false)
}
</script>
<script type="text/javascript">
function make_blank()
{
document.ccform.jname.value ="";
}
</script>
<script type="text/javascript">
function makes_blank()
{
document.ccform.jemail.value ="";
}
</script>
<script type="text/javascript">
function make_blanks()
{
document.ccform.jfeed.value ="";
}
</script>
</head>
<body>
<div align="center">
<?php
if(isset($_POST['submit'])) {
  $jname = $_POST['jname'];
  $jemail = $_POST['jemail'];
  $jfeed = $_POST['jfeed'];
  $time = date("h:i A");
  $date = date("l, F jS, Y");
  $url = $_SERVER['HTTP_HOST'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $headers = 'From: System Admin';
  $subject = "Info";
  $bodys = "Message:\n\n$jfeed\n\nContact Us Form\n\n$date at $time.\n\nIP Address.$ip \n\nE Address: $jemail\n\nName: $jname \n\nUrl: $url ";
  $name = array($jname,$jemail,$jfeed);
  foreach($name as $name) {
    if(preg_match("/</",$name)) {
      echo "<center><div id=\"formes\">Invalid Characters:<a href=\"javascript:history.go(-1)\">Go Back</a></div></center>";
      die();
    }
    if(preg_match("/\\[/",$name)) {
      echo "<center><div id=\"formes\">Invalid Characters:<a href=\"javascript:history.go(-1)\">Go Back</a></div></center>";
      die();
    }
    if(strlen($name) > 250) {
      echo "<center><div id=\"formes\">The field cannot contain more than 150 characters:
      <a href=\"javascript:history.go(-1)\">Go Back</a></div></center>";
      sie();
    }
    if(strlen($name) < 4) {
      echo "<center><div id=\"formes\">Name too short: Min 4 characters:
      <a href=\"javascript:history.go(-1)\">Go Back</a></div></center>";
      sie();
    }
  }
  mail($email,$subject,$bodys,"From: $email") or die ("Mail could not be sent.");
  echo "<center><div id=\"formes\">Thank You:
  <a href=\"contact.html\">Go Back</a></div></center>";
} else {
?>
<?php header( "Location: contact.html" );?>
<?php } ?>
