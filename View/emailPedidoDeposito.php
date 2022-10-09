<?php
   
    //contenido de los productos

    
    $datosLibro = $_POST['datosLibro'];
    $resultado = json_decode($datosLibro);

    //print_r ($resultado[0]->titulo);


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
    $idPaypal = ($_POST['idPaypal']);



    echo "datos:".$direccion."\n".$delegacion."\n".$pais."\n".$estado."\n".$cp."\n".$metodoEnvio."\n".$correo."\n".$nombreCliente."\n".$apellido."\n".$telefono."\n".
    $fechaPago."\n".$status."\n".$subtotal."\n".$precioEnvio."\n".$total."\n".$idPaypal;

    

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
      $idPaypal =$_POST['idPaypal'];

      $asunto = "Compra pendiente";


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
        <p><h3>Por favor <strong>finalice </strong>su compra realizando el déposito correspondiente.</h3></p>
        <p><h4>A continuación le adjuntamos los datos de su compra:.</h4></p>
        <p><h4>número de contacto: '.$telefono.'</h4> </p>
        <p><h4>dirección de domicilio: '.$direccion.' '.$delegacion.' '.$pais.' '.$estado.' '.$cp.' </h4></p>
        <p><h4>Método de envío: '.$metodoEnvio.'</h4> </p>
        <p><h4>Fecha de compra: '.$fechaPago.'</h4> </p>
        <p><h4>Subtotal: '.$subtotal.'</h4> </p>
        <p><h4>Precio de Envío: '.$precioEnvio.'</h4> </p>
        <p><h4>Total: '.$total.'</h4> </p>

        <h1> Datos bancarios:  <h1>
        <p><h4>Banco: Santander </h4> </p>
        <p><h4>Titular: Editorial De Otro Tipo</h4> </p>
        <p><h4>No. de cuenta: 65-50436327-6</h4> </p>
        <p><h4>CLABE: 014180655043632767</h4> </p>
        <p><u>- Envía tu comprobante a contacto@deotrotipo.mx <u></p>

        <p><h2>Producto(s) comprados(s):<h2></p>
        
      </body>
      </html>
      ';

      $datosProductos = "";

      for($indice = 0; $indice < sizeof($resultado) ; $indice++){

             $mensaje = $mensaje.  '
                  <html>
                  <body>
                    <p><h4> Título del libro '.$resultado[$indice]->titulo. '</h4></p>
                    <p><h4> Cantidad de libro(s) '.$resultado[$indice]->cantidad. '</h4></p>
                    <p><h4> Precio '.$resultado[$indice]->precio. '</h4></p>
                    <br>
                  </body>
                  </html>
            ';

              /*$datosProductos = $datosProductos.'Titulo del libro: '.$resultado[$indice]->titulo;
              $datosProductos = $datosProductos.' Cantidad: '.$resultado[$indice]->cantidad;
              $datosProductos = $datosProductos.'Precio: '.$resultado[$indice]->precio;*/

      }

      

      $mail->Body = $mensaje;
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
