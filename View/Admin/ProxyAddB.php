<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  

    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Entradas/";

            $titulo = $_POST['TITULO'];
            $fecha = $_POST['FECHA']; 
            $autor = $_POST['AUTOR'];
            $preview = $_POST['PREVIEW'];
            $entrada = $_POST['ENTRADA'];

            $previewRef = 'preview'.$titulo;
            $entradaRef = 'entrada'.$titulo;

            $archivo = $_FILES['ARCHIVO']['name'];
            $tipoArchivo = $_FILES['ARCHIVO']['type'];
            $sizeArchivo = $_FILES['ARCHIVO']['size'];


            $idActual = 0;

            try{
                $stmt = $conexion->prepare("INSERT INTO `deotrotipo`.`blog` (`idBlog`, `Titulo`, `Autor`, `Fecha`, `Preview`, `Entrada`, `Img`) VALUES (?, ?, ?, ?, ?, ?,?);");
                $stmt->bind_param('issssss', $idActual, $titulo, $autor, $fecha, $previewRef, $entradaRef, $archivo);
                $stmt->execute();
                if($stmt->affected_rows == 1){

                    $prevFile = fopen($carpetaDestino.$previewRef.'.txt', "w") or die("Unable to open file!");
                    fwrite($prevFile, $preview);
                    fclose($prevFile);

                    $inFile = fopen($carpetaDestino.$entradaRef.'.txt', "w") or die("Unable to open file!");
                    fwrite($inFile, $entrada);
                    fclose($inFile);

                    if($sizeArchivo<=11000000){
                        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpetaDestino.$archivo);
                    }


                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=12');
                }else{
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=13');
                }
                $stmt->close();
            }catch(Exception $e){
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=13');
            }




        }
        $conexion->close();
    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }

?>



