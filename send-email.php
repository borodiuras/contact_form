<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.mailfence.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'audryla';                 
    $mail->Password   = 'Apuokas_22';                        
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port       = 465;  
 
    $mail->setFrom($email, $name);           
    $mail->addAddress('ask@audriuskriauciunas.com');
      
    $mail->isHTML(true);                                  
    $mail->Subject = 'Subject';
    $mail->Body    = 'HTML message body in <b>bold</b> ';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 