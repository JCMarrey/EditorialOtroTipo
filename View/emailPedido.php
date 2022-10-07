
<?php
   
    
    /*
    $datosLibro = $_POST['datosLibro'];
    $resultado = json_decode($datosLibro);

    //print_r ($resultado[0]->titulo);


    for($indice = 0; $indice < sizeof($resultado) ; $indice++){
            echo ($resultado[$indice]->titulo);
            echo ($resultado[$indice]->cantidad);
            echo ($resultado[$indice]->precio);
            echo ($resultado[$indice]->imagen);
    }
    
    //datos usuario
    $direccion = $_POST['direccion'];
    $delegacion = $_POST['delegacion'];
    $pais = $_POST['pais'];
    $estado = $_POST['estado'];
    $cp  = $_POST['cp'];
    $metodoEnvio = $_POST['metodoEnvio'];
    $correo = $_POST['correo'];
    $nombreCliente= $_POST['nombreCliente'];
    $apellido= $_POST['apellido'];
    $telefono= $_POST['telefono'];
    
    //datos pago
    $fechaPago = $_POST['fechaPago'];
    $status = $_POST['status'];
    $subtotal = $_POST['subtotal'];
    $precioEnvio = $_POST['precioEnvio'];
    $total = $_POST['total'];
    echo "datos:".$direccion."\n".$delegacion."\n".$pais."\n".$estado."\n".$cp."\n".$metodoEnvio."\n".$correo."\n".$nombreCliente."\n".$apellido."\n".$telefono."\n".
    $fechaPago."\n".$status."\n".$subtotal."\n".$precioEnvio."\n".$total;
    */


    //correo

    use PHPMailer\PHPMailer\{PHPMailer,SMTP,Exception};

    require '../phpMailer/src/PHPMailer.php';
    require '../phpMailer/src/SMTP.php';
    require '../phpMailer/src/Exception.php';


    try {

      //contenido de los productos
      $datosLibro = $_POST['datosLibro'];
      $resultado = json_decode($datosLibro);  

      // Contenido del correo

      $nombreDestinatario = $_POST['nombreCliente'];
      $apellido= $_POST['apellido'];
      $para      = $correo = $_POST['correo'];

      //contenido correo
      $telefono= $_POST['telefono'];
      $direccion = $_POST['direccion'];
      $delegacion = $_POST['delegacion'];
      $pais = $_POST['pais'];
      $estado = $_POST['estado'];
      $cp  = $_POST['cp'];
      $metodoEnvio = $_POST['metodoEnvio'];
      
      //datos pago
      $fechaPago = $_POST['fechaPago'];
      $status = $_POST['status'];
      $subtotal = $_POST['subtotal'];
      $precioEnvio = $_POST['precioEnvio'];
      $total = $_POST['total'];

      $asunto = "Compra registrada";


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
        <title><h1> Estimado '.$nombreDestinatario.' '.$apellido.' <h1></title>
      </head>
      <body>
        <h1> Estimado '.$nombreDestinatario.' '.$apellido.' <h1>
        <p>Su compra ha sido registrada éxitosamente.</p>
        <p>A continuación le adjuntamos los datos de su compra:.</p>
        <p>número de contacto: '.$telefono.' </p>
        <p>dirección de domicilio: '.$direccion.' '.$delegacion.' '.$pais.' '.$estado.' '.$cp.' </p>
        <p>Método de envío: '.$metodoEnvio.' </p>
        <p>Fecha de compra: '.$fechaPago.' </p>
        <p>Subtotal: '.$subtotal.' </p>
        <p>Precio de Envío: '.$precioEnvio.' </p>
        <p>Total: '.$total.' </p>

        <p><h2>Producto(s) comprados(s):<h2></p>
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

?>
