<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $idCovocatoria = 1;
            $titulo = $_POST['TITULO'];
            $subTitulo = $_POST['SUBTITULO'];

            $desc = $_FILES['archdesc']['name'];
            $tipodesc = $_FILES['archdesc']['type'];
            $sizedesc = $_FILES['archdesc']['size'];

            $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Convocatoria/";

            //Archivo de maximo 10 MB
            if($sizedesc<=11000000){
                if(!file_exists($carpetaDestino)){
                    mkdir($carpetaDestino); 
                }
                move_uploaded_file($_FILES['archdesc']['tmp_name'],$carpetaDestino.$desc);
            }

            $img = $_FILES['archImagen']['name'];
            $tipoImg = $_FILES['archImagen']['type'];
            $sizeImg = $_FILES['archImagen']['size'];
            if($sizeImg<=11000000){
                move_uploaded_file($_FILES['archImagen']['tmp_name'],$carpetaDestino.$img);
            }

            
            
            try{
                $stmt = $conexion->prepare("UPDATE `convocatorias` SET `Titulo` = ? , `SubTitulo` = ?, `Imagen`= ?, `Texto` = ?  WHERE `convocatorias`.`IdConvocatoria` = 1");
                $stmt->bind_param('ssss', $titulo, $subTitulo, $img, $desc );
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=8');
                }else{
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=9');
                }
                $stmt->close();
            }catch(Exception $e){
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=9');
            }




        }
        $conexion->close();
    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=9');
    }

?>



