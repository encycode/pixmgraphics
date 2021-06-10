<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help:
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'jaysolanki281222@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/class.phpmailer.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'chavdavivek2001@gmail.com',
    'username' => 'From Procolon',
    'password' => '9033779278',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
 


 <?php
$to = "iamnotbot98@gmail.com";
$subject = "From Procolon";
$txt = "Hello world!";
$headers = "From: chavdavivek2001@gmail.com" ;
if(mail($to,$subject,$txt,$headers)){
	echo "Mail Sent";
}

?>