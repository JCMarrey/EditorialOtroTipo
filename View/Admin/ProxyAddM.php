<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $carpetaDestino1 = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Media/CarruselMain/";
            $carpetaDestino2 = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Media/Semblanzas/";

            $tipo = $_POST['TIPOS']; 


           
            $archivo = $_FILES['ARCHIVO']['name'];
            $tipoArchivo = $_FILES['ARCHIVO']['type'];
            $sizeArchivo = $_FILES['ARCHIVO']['size'];
            if($sizeArchivo<=11000000){
                if( strcmp($tipo, "CARRUSEL") == 0 ){
                    move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpetaDestino1.$archivo);
                }elseif (strcmp($tipo, "SEMBLANZA") == 0){
                    move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpetaDestino2.$archivo);
                }
            }
            
           
            $idActual = 0;
            
            try{
                $stmt = $conexion->prepare("INSERT INTO `deotrotipo`.`media` (`idMedia`, `Tipo`, `Archivo`) VALUES (?, ?, ?);");
                $stmt->bind_param('iss', $idActual, $tipo, $archivo );
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
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }

?>



