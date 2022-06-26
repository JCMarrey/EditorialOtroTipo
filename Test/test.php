<?php 




$sinopsis = $_FILES['archSinopsis']['name'];
//$sinopsis = $_POST['SINOPSIS']; ///
$tipoSinopsis = $_FILES['archSinopsis']['type'];
$sizeSinopsis = $_FILES['archSinopsis']['size'];

//Archivo de maximo 10 MB
if($sizeSinopsis<=11000000){

   
        $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Test/img/";
    
        if(!file_exists($carpetaDestino)){
            mkdir($carpetaDestino); 
        }
        move_uploaded_file($_FILES['archSinopsis']['tmp_name'],$carpetaDestino.$sinopsis);
    


}




?>




