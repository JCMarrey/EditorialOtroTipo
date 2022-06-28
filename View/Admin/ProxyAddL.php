<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $titulo = $_POST['TITULO']; 
            $precio = $_POST['PRECIO']; 
            $autor = $_POST['AUTOR']; 
            $isbn = $_POST['ISBN']; 
            $tema = $_POST['TEMA']; 
            $tipo = $_POST['TIPO']; 
            $coleccion = $_POST['COLECCION']; 
            $aedicion = $_POST['AEDICION']; 
            $edicion = $_POST['EDICION']; 
            $paginas = $_POST['PAGINAS']; 
            $peso = $_POST['PESO']; 
            $firma = $_POST['FIRMA']; 
            $costo = $_POST['COSTO']; 
            $idActual = 0;


            $sinopsis = $_FILES['archSinopsis']['name'];
            $tipoSinopsis = $_FILES['archSinopsis']['type'];
            $sizeSinopsis = $_FILES['archSinopsis']['size'];

            $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Libros/$isbn/";

            //Archivo de maximo 10 MB
            if($sizeSinopsis<=11000000){
                if(!file_exists($carpetaDestino)){
                    mkdir($carpetaDestino); 
                }
                move_uploaded_file($_FILES['archSinopsis']['tmp_name'],$carpetaDestino.$sinopsis);
            }

            $img = $_FILES['archImagen']['name'];
            $tipoImg = $_FILES['archImagen']['type'];
            $sizeImg = $_FILES['archImagen']['size'];
            if($sizeImg<=11000000){
                move_uploaded_file($_FILES['archImagen']['tmp_name'],$carpetaDestino.$img);
            }

            $cap1 = $_FILES['archCap1']['name'];
            $tipoCap1 = $_FILES['archCap1']['type'];
            $sizeCap1 = $_FILES['archCap1']['size'];
            if($sizeCap1<=11000000){
                move_uploaded_file($_FILES['archCap1']['tmp_name'],$carpetaDestino.$cap1);
            }
            
            $audio = $_FILES['archAudio']['name'];
            $tipoAudio = $_FILES['archAudio']['type'];
            $sizeAudio = $_FILES['archAudio']['size'];
            if($sizeAudio<=11000000){
                move_uploaded_file($_FILES['archAudio']['tmp_name'],$carpetaDestino.$audio);
            }
            
            $firma = $_POST['FIRMA'];

            $gandhi = $_POST['Gandhi'];
            $porrua = $_POST['Porrua'];
            $carlosFuentes = $_POST['CarlosFuentes'];
            $sotano = $_POST['Sotano'];
            $amazon = $_POST['Amazon'];

            
            try{
                $stmt = $conexion->prepare("INSERT INTO `deotrotipo`.`libro` (`idLibro`, `Titulo`, `Sinopsis`, `Precio`, `Autor`, `ISBN`, `Tema`, `Tipo`, `Coleccion`, `AEdicion`, `Edicion`, `Paginas`, `Peso`, `Firma`, `Imagen`, `Capitulo1`, `Costo`, `Audio`, `Gandhi`, `Porrua`, `CarlosFuentes`, `Sotano`, `Amazon`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
                $stmt->bind_param('issdsssssisidsssdssssss', $idActual, $titulo, $sinopsis, $precio, $autor, $isbn, $tema, $tipo, $coleccion, $aedicion, $edicion, $paginas, $peso, $firma, $img, $cap1, $costo, $audio, $gandhi, $porrua, $carlosFuentes, $sotano, $amazon );
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=1');
                }else{
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=4');
                }
                $stmt->close();
            }catch(Exception $e){
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=4');
            }




        }
        $conexion->close();
    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }

?>



