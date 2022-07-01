<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $carpetaDestino1 = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Media/CarruselMain/";
            $carpetaDestino2 = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Media/Semblanzas/";


            $archivoNuevo = $_FILES['ARCHIVO']['name'];
            $tipoArchivo = $_FILES['ARCHIVO']['type'];
            $sizeArchivo = $_FILES['ARCHIVO']['size'];            
           
            $idActual = $_POST['IdArchivo']; ;
            $archivoViejo = $_POST['nameArchivo'];
            $tipo = $_POST['tipoArchivo']; 
            
            try{
                $stmt = $conexion->prepare("UPDATE `deotrotipo`.`media` SET `Tipo` = ?, `Archivo` = ? WHERE (`idMedia` = ?);                ");
                $stmt->bind_param('ssi', $tipo, $archivoNuevo, $idActual);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    if($sizeArchivo<=11000000){
                        if( strcmp($tipo, "CARRUSEL") == 0 ){
                            unlink($carpetaDestino1.$archivoViejo);
                            move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpetaDestino1.$archivoNuevo);
                            
                        }elseif (strcmp($tipo, "SEMBLANZA") == 0){
                            unlink($carpetaDestino2.$archivoViejo);
                            move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpetaDestino2.$archivoNuevo);
                            
                        }
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



