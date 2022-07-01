<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $id = $_POST['ID'];
            $rol = 'ADMIN';
            $nombre = $_POST['NOMBRE'];
            $correo = $_POST['CORREO'];

           // $safePass = password_hash($_POST['PASS'], PASSWORD_BCRYPT, ['cost'=>4]);
            $pass = $_POST['PASS'];
            try{
                $stmt = $conexion->prepare("UPDATE `deotrotipo`.`usuarios` SET `idUsuarios` = ?, `Nombre` = ?, `Correo` = ?, `Pass` = ?, `Rol` = ? WHERE (`idUsuarios` = ?);");
                $stmt->bind_param('issssi', $id, $nombre, $correo, $pass, $rol,$id  );
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=14');
                }else{
                    header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=15');
                }
                $stmt->close();
            }catch(Exception $e){
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=15');
            }




        }
        $conexion->close();
    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }

?>



