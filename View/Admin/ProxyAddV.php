<?php
    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  
    if(isset($_SESSION['usuario'])){
        if(isset($_POST)){
            require_once('Conexion.php');
            $IdVenta = 0;
            $IdLibro = $_POST['LIBRO'];
            $IdPaypal = 0;
            $subtotal = 0;
            $precioEnvio = $_POST['COSTOENVIO'];
            $total = 0;
            $cantidadLibro = $_POST['CANTIDAD'];
            $fechaPago = $_POST['FECHAPAGO'];
            $estado = "REGISTRADA";

            $precioLibro = $_POST[(string)$IdLibro];

            $subtotal = $cantidadLibro * $precioLibro;
            $total = $subtotal + $precioEnvio;

            
            try{

                $sql_obtenerCantidadLibro = $conexion->prepare("SELECT Cantidad FROM libro WHERE idLibro = ? ");
                if($sql_obtenerCantidadLibro == false){
                    echo 'hubo un error en obtener cantidad libro';
                    return ['ok' => 'false'];
                }
                    
                $sql_obtenerCantidadLibro->bind_param('i',$IdLibro);
                $sql_obtenerCantidadLibro->execute();
                $result = $sql_obtenerCantidadLibro->get_result();
                $arreglo = $result->fetch_assoc(); 
                $cantidadActual = $arreglo['Cantidad'];

                

                $sql_actualizarInventario = $conexion->prepare("UPDATE deotrotipo.libro SET Cantidad = ? WHERE (idLibro = ?);");
                if($sql_actualizarInventario == false){
                    echo 'hubo un error en actualizar inventario';
                    return ['ok' => 'false'];
                }else{
                    $cantidadActual = $cantidadActual-$cantidadLibro;
                    //ii == integer, integer.
                    $sql_actualizarInventario->bind_param('ii', $cantidadActual, $IdLibro);
                    $sql_actualizarInventario->execute();
                    echo "\nregistro actualizado: la cantidad es: ".$cantidadActual;
                }

                $sql = "INSERT INTO `ventaj` (`IdVenta`, `IdLibro`, `IdPaypal`, `subtotal`, `precioEnvio`, `total`, `cantidadLibro`, `fechaPago`, `estado`) 
                                        VALUES ($IdVenta, $IdLibro, $IdPaypal, $subtotal, $precioEnvio, $total, $cantidadLibro, '$fechaPago', '$estado');";
                if(mysqli_query($conexion, $sql)){
                    echo "Records added successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
                }
                
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=12');

            }catch(Exception $e){
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=9');
            }
        }
        $conexion->close();
    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }
?>