<?php
    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  
    if(isset($_SESSION['usuario'])){
        if(isset($_POST)){
            require_once('Conexion.php');

            $idLibro = $_POST['LIBRO'];
            $isbn = $_POST[(string)$idLibro];
            $cantidadActual = $_POST[(string)$isbn];
            
            $cantidadNueva = $_POST['CANTIDADNUEVA'] + $cantidadActual;

            try{
                $stmt = $conexion->prepare("UPDATE `libro` SET `Cantidad` = ? WHERE `libro`.`idLibro` = ? AND `libro`.`ISBN` = ?;");
                $stmt->bind_param('iis', $cantidadNueva, $idLibro, $isbn );
                $stmt->execute();
                if($stmt->affected_rows == 1){

                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=2');
                }else{
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=5');
                }
                $stmt->close();
            }catch(Exception $e){
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=5');
            }
        }
        $conexion->close();
    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }
?>