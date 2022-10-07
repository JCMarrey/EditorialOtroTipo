<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  

    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Media/LogosPortales/";

            $titulo = $_POST['TITULO'];
            $autor = $_POST['AUTOR'];  
            $fecha = $_POST['FECHA']; 
            $resumen = $_POST['RESUMEN'];
            $url = $_POST['URL'];
           
            $archivo = $_FILES['LOGO']['name'];
            $tipoArchivo = $_FILES['LOGO']['type'];
            $sizeArchivo = $_FILES['LOGO']['size'];

            
            $idActual = 0;
            $lugar = "NULL";
            try{
                $stmt = $conexion->prepare("INSERT INTO `deotrotipo`.`noticia` (`IdNoticia`, `Titulo`, `Fecha`, `Resumen`, `LogoPortal`, `Autor`, `Url`) VALUES (?, ?, ?, ?, ?,?,?);                ");
                $stmt->bind_param('issssss', $idActual, $titulo, $fecha, $resumen, $archivo, $autor, $url);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    if($sizeArchivo<=11000000){
                        //Una vez agregado un logo este ya no se elimina, se recomienda utilizar siempre la misma 
                        //imagen con el mismo logo
                        move_uploaded_file($_FILES['LOGO']['tmp_name'],$carpetaDestino.$archivo);
                        header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=8');
                    }else{
                        header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=7');
                    }
                    
                }else{
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=13');
                }
                $stmt->close();
            }catch(Exception $e){
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=9');
            }




        }
        $conexion->close();
    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }

?>