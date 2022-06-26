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
            $idActual = $_POST['IDLIBRO'];


            $sinopsis = $_FILES['archSinopsis']['name'];
            $tipoSinopsis = $_FILES['archSinopsis']['type'];
            $sizeSinopsis = $_FILES['archSinopsis']['size'];

            $img = $_FILES['archImagen']['name'];
            $tipoImg = $_FILES['archImagen']['type'];
            $sizeImg = $_FILES['archImagen']['size'];

            $cap1 = $_FILES['archCap1']['name'];
            $tipoCap1 = $_FILES['archCap1']['type'];
            $sizeCap1 = $_FILES['archCap1']['size'];

            $audio = $_FILES['archAudio']['name'];
            $tipoAudio = $_FILES['archAudio']['type'];
            $sizeAudio = $_FILES['archAudio']['size'];

            
            $firma = $_POST['FIRMA'];

            $gandhi = $_POST['Gandhi'];
            $porrua = $_POST['Porrua'];
            $carlosFuentes = $_POST['CarlosFuentes'];
            $sotano = $_POST['Sotano'];
            $amazon = $_POST['Amazon'];

            echo $idActual;
            echo $isbn;
            try{
                $stmt = $conexion->prepare("UPDATE `deotrotipo`.`libro` SET `idLibro` = ?, `Titulo` = ?, `Sinopsis` = ?, `Precio` = ?, `Autor` = ?, `ISBN` = ?, `Tema` = ?, `Tipo` = ?, `Coleccion` = ?, `AEdicion` = ?, `Edicion` = ?, `Paginas` = ?, `Peso` = ?, `Firma` = ?, `Imagen` = ?, `Capitulo1` = ?, `Costo` = ?, `Audio` = ?, `Gandhi` = ?, `Porrua` = ?, `CarlosFuentes` = ?, `Sotano` = ?, `Amazon` = ? WHERE (`idLibro` = ?) and (`ISBN` = ?);");
                $stmt->bind_param('issdsssssisidsssdssssssii', $idActual, $titulo, $sinopsis, $precio, $autor, $isbn, $tema, $tipo, $coleccion, $aedicion, $edicion, $paginas, $peso, $firma, $img, $cap1, $costo, $audio, $gandhi, $porrua, $carlosFuentes, $sotano, $amazon, $idActual, $isbn );
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Libros/$isbn/";
                    if($sizeSinopsis<=11000000){
                        if(!file_exists($carpetaDestino)){
                            mkdir($carpetaDestino); 
                        }
                        move_uploaded_file($_FILES['archSinopsis']['tmp_name'],$carpetaDestino.$sinopsis);
                    }

                    if($sizeImg<=11000000){
                        move_uploaded_file($_FILES['archImagen']['tmp_name'],$carpetaDestino.$img);
                    }
        
                    if($sizeImg<=11000000){
                        move_uploaded_file($_FILES['archCap1']['tmp_name'],$carpetaDestino.$cap1);
                    }
            
                    if($sizeImg<=11000000){
                        move_uploaded_file($_FILES['archAudio']['tmp_name'],$carpetaDestino.$audio);
                    }
                    
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



