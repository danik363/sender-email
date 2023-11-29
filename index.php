<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  header("content-type: application/json");

  $json = file_get_contents('php://input');
  $body = json_decode($json);

  $mail = new PHPMailer(true);

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = $_ENV["HOST"];                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = $_ENV["USERNAME"];                     
    $mail->Password   = $_ENV["PASSWORD"];                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
    $mail->Port       = $_ENV["PORT"];                                    

    //Recipients
    $mail->setFrom('daniksucno363@gmail.com', 'Daniel');
    $mail->addAddress($body->to, $body->nameTo);
    $mail->addReplyTo($body->replyTo, $body->nameReplyTo);

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = $body->subject;
    $mail->Body    = $body->content;
    $mail->AltBody = $body->altContet;

    $mail->send();
    echo 'El mensaje fue enviado';
} catch (Exception $e) {
    echo "Ha ocurrido un error  al enviar el mensaje: {$mail->ErrorInfo}";
}
}


?>