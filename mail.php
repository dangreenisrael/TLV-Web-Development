<pre>
<?php
$name  = $_POST['name'];
$email = $_POST['email'];
$text  = $_POST['text'];
    
    //mail("craig@userfriendlyit.com.au", "email enquiry", $text, "From:" . $email);

require 'includes/PHPMailer/class.phpmailer.php';

$mail = new PHPMailer;
$mail->SMTPDebug = 1;
$mail->IsSMTP();                                    		  	// Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  								// Specify main and backup server
$mail->Port = 465;  
$mail->SMTPAuth = true;                               			// Enable SMTP authentication
$mail->Username = 'donotreply.tlvwebdevelopment@gmail.com';    	// SMTP username
$mail->Password = '22fd73P94h3a8S3';                           	// SMTP password
$mail->SMTPSecure = 'ssl';                       				// Enable encryption, 'ssl' also accepted

$mail->From = 'donotreply.tlvwebdevelopment@gmail.com';
$mail->FromName = 'DNR TLV Web Dev';
$mail->AddAddress('dangreen.tlv@gmail.com', 'Dan Green');  	// Add a recipient
//$mail->AddAddress('ellen@example.com');               	// Name is optional
$mail->AddReplyTo($email, $name);
//$mail->AddCC('cc@example.com');
//$mail->AddBCC('bcc@example.com');

$mail->WordWrap = 50;                                 	// Set word wrap to 50 characters
//$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Message from TLV Web Development Site';
$mail->Body    = $text. "\n ". $email;
$mail->AltBody = $text;

if(!$mail->Send()) {
  // echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';

?>
</pre>