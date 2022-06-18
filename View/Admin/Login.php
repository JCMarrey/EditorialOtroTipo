<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In de otro tipo</title>

    <link rel="stylesheet" href="../../FontAwesome/css/all.css">
    <link rel="stylesheet" href="../../common/Normalize.css">
    <link rel="stylesheet" href="../../common/estilos.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <header class="header-Login">

        <img class="logo" src="../../Icons/logo.svg" alt="Logo Editorial" width="500" height="600">

        <div class="header-item-Login">
            <i class="fa  fa-user icono-header-login"></i>
            <p>Log In De Otro Tipo</p>
        </div>

    </header>

    <div class="separador-admin"></div>

    <div class="contenedor1-login">
        <div class="contenedor2-login">
            <form action="LoginVerify.php" method="POST" class="form-login">
                
                <div class="formField">
                    <input type="text" name="user" id="userName" placeholder="Nombre Usuario">
                </div>

                <div class="formField">
                    <input type="password" name="pass" id="userPass" placeholder="Contraseña">
                </div>

                <input type="submit" name="Login" id="btnLogIn" value="Ingresar">

            </form>
        </div>
    </div>


    <?php if(!empty($_GET)): ?>
        <?php  if($_GET['r'] == 1): ?>
            <script>
                swal("Recuerda","Todos los campos son obligatorios, no pueden estar vacios",'info');
            </script>
        <?php endif; ?>

        <?php if($_GET['r'] == 2): ?>
            <script>
                swal("Acceso denegado","La contraseña es incorrecta, vuelve a intentarlo",'error');
            </script>
        <?php endif; ?>

        <?php if($_GET['r'] == 3): ?>
            <script>
                swal("Acceso denegado","El nombre de usuario no existe, vuelve a intentarlo",'error');
            </script>
        <?php endif; ?>

        <?php if($_GET['r'] == 4): ?>
            <script>
                swal("Acceso denegado","Necesitas iniciar sesion para ingresar a la pagina",'error');
            </script>
        <?php endif; ?>

    <?php endif; ?>



</body>
</html>