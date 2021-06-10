<?php
session_start();
require_once("conn.php");
require_once("class.phpmailer.php");
?>

<?php

//$email=@$_POST['usernameoremail'];
$email=@$_POST['username'];

$q="SELECT `password` FROM `admin` WHERE email='$email'";
$result=mysqli_query($conn,$q);
//echo $q;
$count=mysqli_num_rows($result);
		if($count==1)
		{
while($f1=mysqli_fetch_array($result))
{
$mail = new PHPMailer();
$link="YOUR PASSWORD IS ".$f1['password'];
$body = $link;
}
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 1;                // enables SMTP debug information (for testing)
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                             // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "chavdavivek2001@gmail.com";  // GMAIL username(from)
$mail->Password   = "9033779278";            // GMAIL password(from)
$mail->SetFrom ('chavdavivek2001@gmail.com', 'Online Store');	//from
$mail->AddReplyTo($email,"quiz4u");//to
$mail->Subject    = "Notification for forget Password";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
$mail->MsgHTML($body);
$address = $email; //to
$mail->AddAddress($address, "Notification");
if(!$mail->Send()) 
{
  echo "Mailer Error: " . $mail->ErrorInfo;
} 
else
{
  		echo "Your Password is send to your above Email Check your Password and try again...";
}
		}
else
{
	echo "Your Email is not valid or not register yet....";
	
}
//smtpmailer("$email","$fro", "$sub", "$bo", "$bo");
?>
	