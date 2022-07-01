<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Media/Eventos/";
            $fecha = $_POST['FECHA']; 
            $info = $_POST['INFO'];
           
            $archivo = $_FILES['BANNER']['name'];
            $tipoArchivo = $_FILES['BANNER']['type'];
            $sizeArchivo = $_FILES['BANNER']['size'];

            $idActual = $_POST['IdEvento']; ;
            $archivoViejo = $_POST['nameArchivo'];
            $tipo = $_POST['tipoArchivo']; 
            $lugar = "NULL";
            try{
                $stmt = $conexion->prepare("UPDATE `deotrotipo`.`evento` SET `idEvento` = ?, `Fecha` = ?, `Lugar` = ?, `img` = ?, `info` = ? WHERE (`idEvento` = ?);");
                $stmt->bind_param('issssi', $idActual, $fecha, $lugar, $archivo, $info, $idActual);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    if($sizeArchivo<=11000000){
                        unlink($carpetaDestino.$archivoViejo);
                        move_uploaded_file($_FILES[BANNER]['tmp_name'],$carpetaDestino.$archivo);
                        
                    }
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=6');
                }else{
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=7');
                }
                $stmt->close();
            }catch(Exception $e){
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=7');
            }

        }
        $conexion->close();
    }else{
     header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }

?>



