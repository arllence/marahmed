<?php
#######################################
$email = 'bobiekings@gmail.com';##########
##########################################################################
# The Contact Us project is free software; you can redistribute it and/or #
# modify it under the terms of the GNU General Public License             #
# as published by the Free Software Foundation; either version 2          #
# of the License, or (at your option) any later version.                  #
# This program is distributed in the hope that it will be useful,         #
# but WITHOUT ANY WARRANTY; without even the implied warranty of          #
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           #
# GNU General Public License for more details.                            #
##########################################################################
?>
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
<style type="text/css">
h4{
font-family:"trebuchet ms";
color:#555;
}
#formes {
align:center;
margin:auto 0;
width:469px;
padding-top:10px;
padding-bottom:10px;
border:1px dotted #ccc;
background-color:#FAFAFA;
font-family:"trebuchet ms";
font-size:12px;
}
#fname {
width:355px;
border:#ccc solid 1px;
background:#fff url(images/user.png) no-repeat left;
padding-left:44px;
font-family:"trebuchet ms";
font-size:13px;
color:#555;
}
#femail {
width:355px;
border:#ccc solid 1px;
background:#fff url(images/email.png) no-repeat left;
padding-left:44px;
font-family:"trebuchet ms";
font-size:13px;
color:#555;
}
#sfeed {
width:355px;
border:#ccc solid 1px;
background:#fff url(images/text_signature.png) no-repeat top left;
padding-left:44px;
font-family:"trebuchet ms";
font-size:13px;
color:#555;
}
#sbutton {
width:82px;
height:25px;
border:0;
display:block;
background-image: url(images/button.png);
background-repeat: no-repeat;
font-family:"trebuchet ms";
font-size:13px;
color:#555;
}
</style>
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
      echo "<center><div id=\"formes\">Min 4 characters:
      <a href=\"javascript:history.go(-1)\">Go Back</a></div></center>";
      sie();
    }
  }
  mail($email,$subject,$bodys,"From: $email");
  echo "<center><div id=\"formes\">Thank You</div></center>";
} else {
?>
<h4>Contact Us</h4>
<form name=ccform id="formes" action="contact.php" method="post" onSubmit="return checkEmail(this)">
<p><input name="jname" type="text" id="fname" value='Enter Your Name' onclick="make_blank();"></p>
<p><input name="jemail" type="text" id="femail" value='Enter Your Email' onclick="makes_blank();"></p>
<p><textarea name="jfeed" id="sfeed" value='Your Message' onclick="make_blanks();" rows="3" cols="25">Your Message</textarea></p>
<p><input id="sbutton" type="submit" name="submit" value="Submit"></p>
</form>
<?php } ?>
</div>