<?php


use PHPMailer\PHPMailer\{PHPMailer,SMTP,Exception};

require '../phpMailer/src/PHPMailer.php';
require '../phpMailer/src/SMTP.php';
require '../phpMailer/src/Exception.php';

    $prueba = $_POST['asunto'];

    try {
      // Contenido del correo
      $nombreDestinatario = ($_POST["nombreDestinatario"]);
      $asunto    = ($_POST["asunto"]);
      $contenido = ($_POST["contenido"]);
      $para      = ($_POST["destinatario"]);

    //correo electronico válaido
      if (!filter_var($para, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Dirección de correo electrónico no válida.');
      }
 
      // Intancia de PHPMailer
      $mail                = new PHPMailer();
   
      // Es necesario para poder usar un servidor SMTP como gmail
      $mail->isSMTP();
   
      // Si estamos en desarrollo podemos utilizar esta propiedad para ver mensajes de error
      //SMTP::DEBUG_OFF    = off (for production use) 0
      //SMTP::DEBUG_CLIENT = client messages 1 
      //SMTP::DEBUG_SERVER = client and server messages 2
      $mail->SMTPDebug     = 0;//SMTP::DEBUG_SERVER;
   
      //Set the hostname of the mail server
      $mail->Host          = 'smtp.gmail.com';
      $mail->Port          = 465;//SSL // o 587 TLS
   
      // Propiedad para establecer la seguridad de encripción de la comunicación
      $mail->SMTPSecure    = PHPMailer::ENCRYPTION_SMTPS; // tls o ssl para gmail obligado
   
      // Para activar la autenticación smtp del servidor
      $mail->SMTPAuth      = true;
 
      // Credenciales de la cuenta
      $email              = 'zickplacebo@gmail.com';
      $mail->Username     = $email;
      $mail->Password     = 'zlopdggeqfflvciv';
   
      // Quien envía este mensaje
      $mail->setFrom($email, 'Juan Carlos..');
 
      // Si queremos una dirección de respuesta
      $mail->addReplyTo($para, $nombreDestinatario);
   
      // Destinatario
      $mail->addAddress($para, $nombreDestinatario);
      $mail->addAddress($email, 'Editorial otro tipo');
   
      // Asunto del correo
      $mail->Subject = $asunto;
 
      // Contenido
      /*$mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';
      $cuerpo ='<p><h1>Estimado'. $nombreDestinatario.'</h></p>';
      $cuerpo .= '<h2>Gracias por su correo en un momento alguien se pongdrá en contacto contigo</h2>';
      $cuerpo.= 'Motivo del correo: <b>'. $asunto .'</b>'.'<p>'. $contenido .'</p>';
      $foto= "../img/1.jpg";
      $estilos = '<img src="'. $foto .'" width="300">';
      $mail->MsgHTML($estilos);
      //$mail->Body = utf8_decode($cuerpo);
      //$mail->MsgHTML($cuerpo);
      //$mail->addAttachment($foto);
      // Texto alternativo
      $mail->AltBody = 'Detalles de tu compra...';
 */
      // Agregar algún adjunto
      $mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';
      $foto= "../img/1.jpg";
      $mail->addAttachment($foto);
      $mensaje = '
      <html>
      <head>
        <title><h1>Estimado'.$nombreDestinatario.'<h1></title>
      </head>
      <body>
        <p>Gracias por ponerse en contacto con Editorial de otro tipo.</p>
        <p>En el transcurso del día alguien de nuestro equipo se pondra en contacto con usted.</p>
        <p>Motivo del correo: <b>'. $asunto .'</b><p>'. $contenido .'</p>      
        <img src="https://k60.kn3.net/E/7/F/2/4/8/472.gif">
      </body>
      </html>
      ';
      $mail->Body = utf8_decode($mensaje);
      // Texto alternativo
      $mail->AltBody = 'Detalles de tu compra...';
   
      $mail->setLanguage('es','../phpmailer/language/phpmailer.lang-es.php'); 

      // Enviar el correo
      if (!$mail->send()) {
        throw new Exception($mail->ErrorInfo);
        
      }
      header("Location: /View/enviado.php", TRUE, 301);
      exit();
 
      //Flasher::success(sprintf('Mensaje enviado con éxito a %s', $para));
      //Redirect::back();
 
    } catch (Exception $e) {
     // Flasher::error($e->getMessage());
      //Redirect::back();
      echo "no envíado..";
      exit();
    }







/*
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                                               
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;  //SMTP::DEBUG_OFF;   para producción                 //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
   
    $mail->Host       = 'smtp.gmail.com'; //gmail host                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'zickplacebo@gmail.com';                     //SMTP username
    $mail->Password   = 'nevermind21';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('zickplacebo@gmail.com', 'Juan Carlos');
    $mail->addAddress('zickplacebo@gmail.com');     //Add a recipient


    //Attachments
   /* $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Detalles de su compra';
    $cuerpo = '<h2>Gracias por su compra</h2>';
    $cuerpo .= '<p> El ID de su compra es: <b>'. 65 .'<\b><\p>';
    $mail->Body = utf8_decode($cuerpo);
    $mail->AltBody = 'Le enviamos los detalles de su compra...';

    $mail->setLanguage('es','../phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
    echo 'el mensaje se envío correctamente';
} catch (Exception $e) {
    echo "Error al enviar correso electrónico de la compra: {$mail->ErrorInfo}";
    exit;
}
*/

?>