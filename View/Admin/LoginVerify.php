<?php

    if(isset($_POST['Login'])){

        require_once ('Conexion.php');

        $nombre = $_POST['user'];
        $pass = $_POST['pass'];

        if(strlen($nombre) == 0 || strlen($pass) == 0){
            
            header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=1');
        }

        $query="SELECT* FROM usuarios WHERE Nombre = '$nombre'";

        $resultado = mysqli_query($conexion, $query);


        if($conexion->affected_rows == 1){
            $usuario = mysqli_fetch_assoc($resultado);
            //password_verify($pass, $usuario['PassWord'])
            if(strcmp($pass,$usuario['Pass']) === 0){
                
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php');
                
            }else{
                header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=2');
            }
        }else{
            header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=3');
        }
        

    }else{
        header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
    }



?>