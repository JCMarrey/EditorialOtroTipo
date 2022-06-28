<?php 
    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        require_once('Conexion.php');
   
        if(strcmp($_POST['accion'],'viewLibro') == 0){

            $isbn = $_POST['ISBN'];

            $sql = "SELECT * FROM deotrotipo.libro WHERE ISBN = ?"; // SQL with parameters
            $stmt = $conexion->prepare($sql); 
            $stmt->bind_param("s", $isbn);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $user = $result->fetch_assoc(); 
            
            echo json_encode($user);
            

        }

        if(strcmp($_POST['accion'],'addLibro') == 0){
            
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

           
            $img = $_POST['IMAGEN']; /////
            $cap1 = $_POST['CAPITULO1']; ///

            $sinopsis = $_FILES['archSinopsis']['name'];
            //$sinopsis = $_POST['SINOPSIS']; ///
            $tipoSinopsis = $_FILES['archSinopsis']['type'];
            $sizeSinopsis = $_FILES['archSinopsis']['size'];
            
            //Archivo de maximo 10 MB
            if($sizeSinopsis<=11000000){
    
               
                    $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Libros/$isbn/";
                
                    if(!file_exists($carpetaDestino)){
                        mkdir($carpetaDestino); 
                        //move_uploaded_file($_FILES['archSinopsis']['tmp_name'],$carpetaDestino.$sinopsis);
                    }
                    move_uploaded_file($_FILES['archSinopsis']['tmp_name'],$carpetaDestino.$sinopsis);
                
          
           
            }

            try{
                    $stmt = $conexion->prepare("INSERT INTO `deotrotipo`.`libro` (`idLibro`, `Titulo`, `Sinopsis`, `Precio`, `Autor`, `ISBN`, `Tema`, `Tipo`, `Coleccion`, `AEdicion`, `Edicion`, `Paginas`, `Peso`, `Firma`, `Imagen`, `Capitulo1`, `Costo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
                    $stmt->bind_param('issdsssssisidsssd', $idActual, $titulo, $sinopsis, $precio, $autor, $isbn, $tema, $tipo, $coleccion, $aedicion, $edicion, $paginas, $peso, $firma, $img, $cap1, $costo );
                    $stmt->execute();
                    if($stmt->affected_rows == 1){
                        $respuesta = array (
                            'id' => $stmt->insert_id,
                            'respuesta' => 'correcto'
                        );
                    }else{
                        $respuesta = array (
                            'respuesta' => 'incorrecto'
                        );
                    }
                    $stmt->close();
                    //$conexion->close();
            }catch(Exception $e){
                    $respuesta = array(
                        'respuesta' => $e->getMessage()
                    );
            }
            echo json_encode($respuesta);

        }

        if(strcmp($_POST['accion'],'editLibro') == 0){
            
            $titulo = $_POST['TITULO']; 
            $sinopsis = $_POST['SINOPSIS']; 
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
            $img = $_POST['IMAGEN']; 
            $cap1 = $_POST['CAPITULO1']; 
            $costo = $_POST['COSTO']; 
  
        
        
            $stmt = $conexion->prepare("UPDATE `deotrotipo`.`libro` SET `Titulo` = ?, `Sinopsis` = ?, `Precio` = ?, `Autor` = ?, `ISBN` = ?, `Tema` = ?, `Tipo` = ?, `Coleccion` = ?, `AEdicion` = ?, `Edicion` = ?, `Paginas` = ?, `Peso` = ?, `Firma` = ?, `Imagen` = ?, `Capitulo1` = ?, `Costo` = ? WHERE (`ISBN` = ?);");
            $stmt->bind_param('ssdsssssisidsssds',  $titulo, $sinopsis, $precio, $autor, $isbn, $tema, $tipo, $coleccion, $aedicion, $edicion, $paginas, $peso, $firma, $img, $cap1, $costo, $isbn);
            $res = $stmt->execute();
            if($res){
                $respuesta = array (
                    'id' => $stmt->insert_id,
                    'respuesta' => 'correcto'
                );
            }else{
                $respuesta = array (
                    'respuesta' => 'incorrecto'
                );
            }
                    
         
            echo json_encode($respuesta);

        }
      
        if(strcmp($_POST['accion'],'deleteLibro') == 0){
            
            $isbn = $_POST['ISBN'];
            $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Libros/$isbn/";
            
            $stmt = $conexion->prepare("DELETE FROM `deotrotipo`.`libro` WHERE ISBN = ?");
            $stmt->bind_param('s',$isbn);
            $res = $stmt->execute();

            if($res){
                array_map('unlink', glob("$carpetaDestino*.*"));
                rmdir($carpetaDestino);
                $respuesta = array (
                    'id' => $stmt->insert_id,
                    'respuesta' => 'correcto'
                );
            }else{
                $respuesta = array (
                    'respuesta' => 'incorrecto'
                );
            }
                
        
            echo json_encode($respuesta);
        }
        
        if(strcmp($_POST['accion'],'viewArchivo') == 0){

            $id = $_POST['ID'];

            $sql = "SELECT * FROM deotrotipo.media WHERE idMedia = ?"; // SQL with parameters
            $stmt = $conexion->prepare($sql); 
            $stmt->bind_param("s", $id);
            $stmt->execute();
           
            $result = $stmt->get_result(); // get the mysqli result
            $user = $result->fetch_assoc(); 
            
          
            
            echo json_encode($user);
            

        }

        if(strcmp($_POST['accion'],'deleteArchivo') == 0){
            
            $id = $_POST['ID'];
            $tipo = $_POST['TIPO'];
            $name = $_POST['NAME'];

            
            $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Media/";

            if(strcmp($tipo,"CARRUSEL") == 0){
                $carpetaDestino = $carpetaDestino.'CarruselMain/';
            }elseif(strcmp($tipo,"SEMBLANZA") == 0){
                $carpetaDestino = $carpetaDestino.'Semblanzas/';
            }
            
            $stmt = $conexion->prepare("DELETE FROM `deotrotipo`.`media` WHERE idMedia = ?");
            $stmt->bind_param('i',$id);
            $res = $stmt->execute();

            if($res){
                unlink($carpetaDestino.$name);
                $respuesta = array (
                    'id' => $stmt->insert_id,
                    'respuesta' => 'correcto'
                );
            }else{
                $respuesta = array (
                    'respuesta' => 'incorrecto'
                );
            }
                
        
            echo json_encode($respuesta);
        }

        if(strcmp($_POST['accion'],'viewEvento') == 0){

            $id = $_POST['ID'];

            $sql = "SELECT * FROM deotrotipo.evento WHERE idEvento = ?"; // SQL with parameters
            $stmt = $conexion->prepare($sql); 
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $user = $result->fetch_assoc(); 
            
            

            echo json_encode($user);
            

        }

        if(strcmp($_POST['accion'],'deleteEvento') == 0){
            
            $id = $_POST['ID'];
            $name = $_POST['NAME'];
            
            $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Media/Eventos/";
            
            $stmt = $conexion->prepare("DELETE FROM `deotrotipo`.`evento` WHERE idEvento = ?");
            $stmt->bind_param('i',$id);
            $res = $stmt->execute();

            if($res){
                unlink($carpetaDestino.$name);
                $respuesta = array (
                    'id' => $stmt->insert_id,
                    'respuesta' => 'correcto'
                );
            }else{
                $respuesta = array (
                    'respuesta' => 'incorrecto'
                );
            }
                
        
            echo json_encode($respuesta);
        }

        $conexion->close();

    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }

?>
