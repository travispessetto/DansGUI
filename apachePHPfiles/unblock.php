<?php
//Only Show errors, this is to make ajax behave
error_reporting(E_ERROR);
//lets ask for a password
include ("password.php");
$pass = $_POST['pass'];
$ref = base64_decode($_POST['ref']);
if($pass == ""){
echo json_encode(array("msg"=>"Password is required."));
die();
}
if(!($pass == $setpass)){
echo json_encode(array("msg"=>"Password Invalid"));
die();
}//end invalid password
//print "STR_REPLACE<br>";
$addstr = str_replace("http://www.","",$ref);
//if that don't work just replace the 
$addstr = str_replace("http://","",$addstr);
//if just a www
$addstr = str_replace("www.","",$addstr);
//print $addstr."<br>";
//print "unblocking";
$file = fopen("/etc/dansguardian/lists/exceptionsitelist",'a');
fwrite($file,$addstr."\n");
if (!$file){
//print "\n<br>COULD NOT OPEN FILE!!!!";
echo json_encode(array("msg"=>"Error: Could Not Open File"));
die();
}
fclose($file);
$file = fopen("/etc/dansguardian/lists/exceptionurllist",'a');
fwrite($file,$addstr."\n");
if (!$file){
//print "\n<br>COULD NOT OPEN FILE!!!!";
echo json_encode(array("msg"=>"Error: Could Not Open File"));
die();
}
fclose($file);
echo json_encode(array("msg"=>"Please wait a minute then, <a href=\"$ref\">CLICK HERE TO CONTINUE</a>"));
exec("/var/www/dansrestart.sh >/dev/null 2>/dev/null &");
?>