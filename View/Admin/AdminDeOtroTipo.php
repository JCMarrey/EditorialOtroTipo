<?php 
    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  
    if(isset($_SESSION['usuario'])): 
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="../../FontAwesome/css/all.css">
        <link rel="stylesheet" href="../../common/Normalize.css">
        <link rel="stylesheet" href="../../common/estilos.css">

        <script src="../../jquery/Library.js"></script>
        <script src="../../jquery/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="../../JS/admin.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <title>Admin de otro tipo</title>
    </head>


    <body>
        <header class="header-Login">

            <img class="logo" src="../../Icons/logo.svg" alt="Logo Editorial" width="500" height="600">
        </header>

        <div class="separador-admin">
            <h2>Sistema de Gestión: </h2>
            <p id="systemName"></p>
        </div>


        <div id="tabsAdmin" class="contenedor-Principal-Admin">

            <div id="contenedor-Nav-Admin-id" class="contenedor-Nav-Admin">
                <ul class="nav nav-tabs flex-column">
                    
                    <li id="controller-tab-catalogo" class="nav-item">
                        <a class="nav-link " aria-current="page" href="#tab-catalogo">Catálogo</a>
                    </li>
                    <li id="controller-tab-eventos" class="nav-item">
                        <a class="nav-link" href="#tab-eventos">Eventos</a>
                    </li>
                    <li id="controller-tab-estadisticas" class="nav-item">
                        <a class="nav-link" href="#tab-estadisticas">Estadisticas</a>
                    </li>

                    <li id="controller-tab-blog" class="nav-item">
                        <a class="nav-link" href="#tab-blog">Blog</a>
                    </li>

                    <li id="controller-tab-pagina" class="nav-item">
                        <a class="nav-link" href="#tab-pagina">Página</a>
                    </li>

                    <li id="controller-tab-usuarios" class="nav-item">
                        <a class="nav-link" href="#tab-usuarios">Usuarios</a>
                    </li>

                    <li class="nav-item-Esp">
                        <p><i class="fa  fa-user icono-header-admin"></i> <?=$_SESSION['usuario']['Nombre']; ?></p>
                    </li>

                    <li>
                        <form class="formLogOut" action="AdminDeOtroTipo.php" method="POST">
                            <input type="submit" class="btn btn-danger " name="cerrarSesion" value="Cerrar Sesión" id="botonLogOut">
                        </form>
                    </li>

                    <?php 
                        if(isset($_POST['cerrarSesion'])){
                            session_destroy();
                            session_unset();
                            $_SESSION = [];
                            header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=5');
                        }
                    ?>


                </ul>
            </div>

            

            <div class="contenedor-WorkSpace-Admin">

                <div id="tab-catalogo">

                    <div class="search-container-Admin">
                        
                            <input  id="Criterio-busqueda" type="text" placeholder="Buscar en catálogo" class="rounded search-input-Admin" name="search">
                            <button type="submit" id="busca-Libro" class ="icon-search"><i class="fa fa-search"></i></button>
                        
                    </div>

                    <div id="btnAdd-catalogo">
                        <button id="btnAgregarProd" type="button" data-bs-toggle="modal" data-bs-target="#ModalAddLibro" class="btn-agregar-producto" ><i class="fas fa-plus-circle"></i> Agregar Libro</button>
      
                    </div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-Admin">
                            <tr>
                            <th id="tHeadISBN"  class="text-center" scope="col">ISBN</th>
                            <th  class="text-center"  scope="col">Titulo</th>
                            <th  class="text-center" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                require_once("Conexion.php");
                                $query = "SELECT * FROM libro";
                                $resultado = mysqli_query($conexion,$query);
                                $numRegistros = mysqli_num_rows($resultado);
                            ?>

                            <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                                <tr class="tr-Admin">
                                    <td  class="text-center" scope="row"><?= $registro['ISBN'];?></td>
                                    <td  class="text-center"><?= $registro['Titulo'];?></td>
                                    <td  id="<?= $registro['ISBN'];?>" class="text-center container-actions">
                                        <i title="Ver detalles" data-bs-toggle="modal" data-bs-target="#ModalViewLibro" class="fas fa-eye   icon-view   icon-action-Admin"></i> 
                                        <i title="Editar"       data-bs-toggle="modal" data-bs-target="#ModalEditLibro" class="fas fa-edit  icon-edit   icon-action-Admin"></i>
                                        <i title="Eliminar"     class="fas fa-trash icon-delete icon-action-Admin"></i>
                                    </td>
                                </tr>                
                            <?php endwhile;?>

                        </tbody>
                    </table>
                </div>
                
                <div id="tab-eventos"></div>
                <div id="tab-estadisticas"></div>
                <div id="tab-blog"></div>
                <div id="tab-pagina"></div>
                <div id="tab-usuarios"></div>
            </div>

        </div>

        <?php
            include('Modals/addLibro.php');
            include('Modals/viewLibro.php');
            include('Modals/editLibro.php');
        ?>

        <?php if(!empty($_GET)): ?>
            <?php  if($_GET['r'] == 1): ?>
                <script>
                    mostrarNotificacion('Se aregó un libro al catálogo.', 'exito');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 2): ?>
                <script>
                    mostrarNotificacion('Se Guardaron Cambios.', 'exito');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 3): ?>
                <script>
                    swal("","Se eliminó el registro correctamente" , 'success');
                </script>
            <?php endif; ?>

        <?php endif; ?>


    </body>
    </html>

<?php else:?>



<?php
    
    header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
endif;
?>