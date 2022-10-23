<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
 

require 'php_mailer/PHPMailer/src/Exception.php';

require 'php_mailer/PHPMailer/src/PHPMailer.php';

require 'php_mailer/PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer();

 

try {

    //Server settings

    $mail->SMTPDebug = FALSE;                      //Enable verbose debug output

    $mail->isSMTP();                                            //Send using SMTP

    $mail->Mailer = 'smtp';

    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through... through Gmail Enter smtp.mail.com

    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Username   ="20341A0541@gmrit.edu.in";      //Enter Your Outlook Mail               //SMTP username

    $mail->Password   ="your password";      //Enter your Mail password                        //SMTP password

    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption

    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

    $mail->Port       =  587;  // for gmail change port numbr into 25                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients

    $mail->setFrom("20341A0541@gmrit.edu.in", 'Kiran');

    $mail->addAddress("chitturisaikiran1210@gmail.com",$email);     //Add a recipient

    //Content

    $mail->isHTML(true);                                  //Set email format to HTML

    $mail->Subject = $subject;

    $mail->Body    = "from " .$name.",<br>".$message;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    //echo 'Message has been sent';

} catch (Exception $e) {

    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}



header("Location: sent.html");
?>