<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $video = $_POST['VIDEONAME'];
            $num = $_POST['VIDEONUM'];
            
            $video = str_replace("watch?v=","embed/",$video);

            echo $video;
            echo $num;

            $idActual = 0;

            if($num == 1){
                $idActual = 21;
            }else{
                $idActual = 22;
            }

            try{
                $stmt = $conexion->prepare("UPDATE `deotrotipo`.`media` SET `Archivo` = ? WHERE (`idMedia` = ?);");
                $stmt->bind_param('si', $video, $idActual);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=10');
                }else{
                   // header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=11');
                }
                $stmt->close();
            }catch(Exception $e){
                //header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=11');
            }

        }
        $conexion->close();
    }else{
     header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }

?>



