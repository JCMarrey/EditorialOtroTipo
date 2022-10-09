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