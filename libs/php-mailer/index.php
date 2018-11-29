<?php
// LLAMADO A LOS NAMESPACES NECESARIOS
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// LLAMADO ALOS ARCHIVOS PHP Q NECESITAMOS
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';





// INSTANCIA
$mail = new PHPMailer(true);                              // SE PONE TRUE PARA HABILITAR ERORES
try {
    //
    //Server settings ESTO ES IMPORTANTE DEJARLO ASI SOLO CAMBIAR EL CORREO Y LA PASSWORD
    //
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'juaneliezer13@gmail.com';                 // SMTP username
    $mail->Password = '25627918';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    // Establece la dirección de correo de origen del Mensaje
    $mail->setFrom('juaneliezer13@gmail.com', 'Mailer'); 
    // Agregaun destinatario , el nombre es opcional
    $mail->addAddress('juaneliezer13@gmail.com','juanito');  
    // Establece la dirección de correo para reply-to creo q es para respuesta
    $mail->addReplyTo('juaneliezer13@gmail.com', 'Information');

    //Attachments agregar aqui si se va a adjuntar algun archivo como por ej una imagen
    
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    // ASUNTO
    $mail->Subject = 'Here is the subject';
    // CUERPO
    

    $mail->Body    = "gdfgdf";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    // enviar
    $mail->send();
    // mostrara este mensaje cuando lo envie
    echo 'mensaje enviado';
} catch (Exception $e) {
	// POR SI NO LO ENVIA
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}