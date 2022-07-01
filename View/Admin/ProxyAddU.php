<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  


    if(isset($_SESSION['usuario'])){

        if(isset($_POST)){

            require_once('Conexion.php');

            $id = 0;
            $rol = 'ADMIN';
            $nombre = $_POST['NOMBRE'];
            $correo = $_POST['CORREO'];

           // $safePass = password_hash($_POST['PASS'], PASSWORD_BCRYPT, ['cost'=>4]);
            $pass = $_POST['PASS'];
            try{
                $stmt = $conexion->prepare("INSERT INTO `deotrotipo`.`usuarios` (`idUsuarios`, `Nombre`, `Correo`, `Pass`, `Rol`) VALUES (?, ?, ?, ?, ?);");
                $stmt->bind_param('issss', $id, $nombre, $correo, $pass, $rol  );
                $stmt->execute();
                if($stmt->affected_rows == 1){
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



