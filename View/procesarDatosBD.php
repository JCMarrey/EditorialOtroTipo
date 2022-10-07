<?php


   require_once('../View/Admin/Conexion.php');
  // require '../config/Database.php';
  // $db = new Database();

   //$con = $db->conectar();

    //guardarEstos datos BD
    $idLibro = ($_POST['idLibro']);
    $idPaypal = ($_POST['idPaypal']);
    $subtotal = ($_POST['subtotal']);
    $precioEnvio = ($_POST['precioEnvio']);
    $total = ($_POST['total']);
    $cantidadLibro = ($_POST['cantidadLibro']);
    $fechaPago = ($_POST['fechaPago']);
    $estado = ($_POST['status']);

    

    echo "subtotal: ".$subtotal."\nFechaPago:".$fechaPago."\nIDLibro:".$idLibro;
    $sql_insertarVenta = $conexion->prepare("INSERT INTO deotrotipo.ventas (idLibro,idPaypal,subtotal,precioEnvio,total,cantidadLibro,fechaPago,estado)
                  VALUES (?,?,?,?,?,?,?,?);");

    if($sql_insertarVenta == false){
        echo 'hubo un error en insertar registro';
        return ['ok' => 'false'];
    }else{
        $sql_insertarVenta->bind_param('iididiss',$idLibro,$idPaypal,$subtotal,$precioEnvio,$total,$cantidadLibro,$fechaPago,$estado);
        $sql_insertarVenta->execute();
        echo 'registro inserado con éxito';
    }
    //$conexion->close();

    
    //buscarlibro con "x" y actualizar su cantidad en la tabla inventario...
    $sql_obtenerCantidadLibro = $conexion->prepare("SELECT AlmacenOficina FROM deotrotipo.inventario WHERE Libro_idLibro = ? ");
    if($sql_obtenerCantidadLibro == false){
        echo 'hubo un error en obtener cantidad libro';
        return ['ok' => 'false'];
    }
        
    $sql_obtenerCantidadLibro->bind_param('i',$idLibro);
    $sql_obtenerCantidadLibro->execute();
    $result = $sql_obtenerCantidadLibro->get_result();
    $arreglo = $result->fetch_assoc(); 
    $cantidad = $arreglo['AlmacenOficina'];
    echo "\n idLibro: ".$idLibro;
        //echo "\n".$cantidad+3;
        //print_r($cantidad);


    //----------------------------------------------------------
      //actualizar
    
    $sql_actualizarInventario = $conexion->prepare("UPDATE deotrotipo.inventario SET AlmacenOficina = ? WHERE (Libro_idLibro = ?);");
    if($sql_actualizarInventario == false){
        echo 'hubo un error en actualizar inventario';
        return ['ok' => 'false'];
    }else{
        $cantidad = $cantidad - $cantidadLibro;
        //ii == integer, integer.
        $sql_actualizarInventario->bind_param('ii', $cantidad, $idLibro);
        $sql_actualizarInventario->execute();
        echo "\nregistro actualizado: la cantidad es: ".$cantidad;
    }
    $conexion->close();

    //ahora se manda toda está información por correo electrónico.


?>

