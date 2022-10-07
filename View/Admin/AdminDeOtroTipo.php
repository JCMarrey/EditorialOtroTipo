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
                    
                    <!--
                        <li id="controller-tab-estadisticas" class="nav-item">
                        <a class="nav-link" href="#tab-estadisticas">Estadisticas</a>
                    </li>
                    -->

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
                                        <i title="Ver detalles" data-bs-toggle="modal" data-bs-target="#ModalViewLibro" class="fas fa-eye  iconos-Acciones icon-view-Libro   icon-action-Admin"></i> 
                                        <i title="Editar"       data-bs-toggle="modal" data-bs-target="#ModalEditLibro" class="fas fa-edit  iconos-Acciones icon-edit-Libro   icon-action-Admin"></i>
                                        <i title="Eliminar"     class="fas fa-trash iconos-Acciones icon-delete icon-action-Admin"></i>
                                    </td>
                                </tr>                
                            <?php endwhile;?>

                        </tbody>
                    </table>
                </div>
                
                <div id="tab-eventos">
                
                    <div id="tabs-Pagina-Eventos">
                        <ul class="nav nav-tabs-Pagina-Eventos">

                            <li id="controller-tab-gestion-noticias" class="nav-item">
                                <a class="nav-link " aria-current="page" href="#tab-gestion-Noticias">Noticias</a>
                            </li>
                            <li id="controller-tab-gestion-eventos" class="nav-item">
                                <a class="nav-link" href="#tab-gestion-eventos">Eventos</a>
                            </li>

                        </ul>

                        <div id="tab-gestion-Noticias">
                                <div id="btnAdd-Evento" class="btnAdd">
                                    <button id="btnAgregarNoticia" type="button" data-bs-toggle="modal" data-bs-target="#ModalAddNoticia" class="btn-agregar-producto" ><i class="fas fa-plus-circle"></i> Agregar Noticia</button>
                                </div>
                
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="thead-Admin">
                                        <tr>
                                        <th id="tHeadISBN"  class="text-center" scope="col">Fecha</th>
                                        <th  class="text-center"  scope="col">Titulo</th>
                                        <th  class="text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            require_once("Conexion.php");
                                            $query = "SELECT * FROM noticia";
                                            $resultado = mysqli_query($conexion,$query);
                                            $numRegistros = mysqli_num_rows($resultado);
                                        ?>

                                        <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                                            <tr class="tr-Admin">
                                                <td  class="text-center" scope="row"><?= $registro['Fecha'];?></td>
                                                <td  class="text-center"><?= $registro['Titulo'];?></td>
                                                <td  id="<?= $registro['IdNoticia'];?>"  class="text-center container-actions">
                                                    <i title="Eliminar" id="<?= $registro['LogoPortal'];?>" class="fas fa-trash icon-delete-Noticia iconos-Acciones icon-action-Admin"></i>
                                                </td>
                                            </tr>                
                                        <?php endwhile;?>

                                    </tbody>
                                </table>
                        </div>

                        <div id="tab-gestion-eventos">
                            <div id="btnAdd-Evento">
                                <button id="btnAgregarEvento" type="button" data-bs-toggle="modal" data-bs-target="#ModalAddEvento" class="btn-agregar-producto" ><i class="fas fa-plus-circle"></i> Agregar Evento</button>
                            </div>
            
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-Admin">
                                    <tr>
                                    <th id="tHeadISBN"  class="text-center" scope="col">Fecha</th>
                                    <th  class="text-center"  scope="col">Información Evento</th>
                                    <th  class="text-center" scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        require_once("Conexion.php");
                                        $query = "SELECT * FROM evento";
                                        $resultado = mysqli_query($conexion,$query);
                                        $numRegistros = mysqli_num_rows($resultado);
                                    ?>

                                    <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                                        <tr class="tr-Admin">
                                            <td  class="text-center" scope="row"><?= $registro['Fecha'];?></td>
                                            <td  class="text-center"><?= $registro['info'];?></td>
                                            
                                                <td  id="<?= $registro['idEvento'];?>"  class="text-center container-actions">
                                                    <i title="Ver detalles" data-bs-toggle="modal" data-bs-target="#ModalViewEvento" class="fas fa-eye iconos-Acciones   view-Evento   icon-action-Admin"></i> 
                                                    <i title="Editar"       data-bs-toggle="modal" data-bs-target="#ModalEditEvento" class="fas fa-edit iconos-Acciones icon-edit-Evento   icon-action-Admin"></i>
                                                    <i title="Eliminar" id="<?= $registro['img'];?>"     class="fas fa-trash icon-delete-Evento iconos-Acciones icon-action-Admin"></i>
                                                </td>
                                        

                                        </tr>                
                                    <?php endwhile;?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                
                </div>
                <!--<div id="tab-estadisticas"></div>-->
                
                <div id="tab-blog">
                    <div id="btnAdd-Evento" class="btnAdd">
                        <button id="btnAgregarBlog" type="button" data-bs-toggle="modal" data-bs-target="#ModalAddBlog" class="btn-agregar-producto" ><i class="fas fa-plus-circle"></i> Agregar Entrada</button>
                    </div>
            
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-Admin">
                            <tr>
                            <th id="tHeadISBN"  class="text-center" scope="col">Autor</th>
                            <th  class="text-center"  scope="col">Titulo</th>
                            <th  class="text-center" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                require_once("Conexion.php");
                                $query = "SELECT * FROM blog";
                                $resultado = mysqli_query($conexion,$query);
                                $numRegistros = mysqli_num_rows($resultado);
                            ?>

                            <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                                <tr class="tr-Admin">
                                    <td  class="text-center" scope="row"><?= $registro['Autor'];?></td>
                                    <td  id="<?= $registro['Img'];?>" class="text-center"><?= $registro['Titulo'];?></td>
                                    
                                    <td  id="<?= $registro['idBlog'];?>"  class="text-center container-actions">
                                        <!--
                                        <i title="Ver detalles" data-bs-toggle="modal" data-bs-target="#ModalViewBlog" class="fas fa-eye iconos-Acciones   icon-view-Blog   icon-action-Admin"></i> 
                                        <i title="Editar"       data-bs-toggle="modal" data-bs-target="#ModalEditBlog" class="fas fa-edit iconos-Acciones icon-edit-Blog   icon-action-Admin"></i>
                                        -->
                                        <i title="Eliminar"     class="fas fa-trash icon-delete-Blog iconos-Acciones icon-action-Admin"></i>
                                    </td>

                                </tr>                
                            <?php endwhile;?>

                        </tbody>
                    </table>
                    
                </div>

                <div id="tab-pagina">

                    <div id="tabs-Pagina-Principal">
                        <ul class="nav nav-tabs-Pagina-Principal">

                        <li id="controller-tab-Carrusel-Main" class="nav-item">
                            <a class="nav-link " aria-current="page" href="#tab-Carrusel-Main">Carrusel y Semblanzas</a>
                        </li>
                        <li id="controller-tab-Videos-Main" class="nav-item">
                            <a class="nav-link" href="#tab-Videos-Main">Videos</a>
                        </li>

                        </ul>

                        <div id="tab-Carrusel-Main">

                            <div id="btnAdd-Media">
                                <button id="btnAgregarMedia" type="button" data-bs-toggle="modal" data-bs-target="#ModalAddMedia" class="btn-agregar-producto" ><i class="fas fa-plus-circle"></i> Agregar</button>
                            </div>

                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-Admin">
                                    <tr>
                                    <th id="tHeadISBN"  class="text-center" scope="col">ID</th>
                                    <th  class="text-center"  scope="col">Archivo</th>
                                    <th  class="text-center" scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        require_once("Conexion.php");
                                        $query = "SELECT * FROM media WHERE tipo = 'CARRUSEL' OR tipo = 'SEMBLANZA';";
                                        $resultado = mysqli_query($conexion,$query);
                                        $numRegistros = mysqli_num_rows($resultado);
                                    ?>

                                    <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                                        <tr class="tr-Admin">
                                            <td  class="text-center" scope="row"><?= $registro['idMedia'];?></td>
                                            <td  class="text-center"><?= $registro['Archivo'];?></td>
                                            
                                                <td  id="<?= $registro['idMedia'];?>"  class="text-center container-actions">
                                                    <i title="Ver detalles" data-bs-toggle="modal" data-bs-target="#ModalViewMedia" class="fas fa-eye iconos-Acciones   view-Media   icon-action-Admin"></i> 
                                                    <i title="Editar"       data-bs-toggle="modal" data-bs-target="#ModalEditMedia" class="fas fa-edit iconos-Acciones icon-edit-Archivo   icon-action-Admin"></i>
                                                    <i title="Eliminar"   id="<?= $registro['Tipo'];?>"   class="fas fa-trash icon-delete-Archivo iconos-Acciones icon-action-Admin"></i>
                                                </td>
                                        

                                        </tr>                
                                    <?php endwhile;?>

                                </tbody>
                            </table>
                        </div>

                        <div id="tab-Videos-Main">
                            <form id = "1" class="formVideos"  method="POST" action="ProxyEditVideos.php">
                                <label for="video1-Main" class="col-form-label">Video 1:</label>
                                <input  type="text" name="VIDEONAME" class="form-control" id="video1-Main">
                                <input  hidden type="text" name="VIDEONUM" value="1">
                                <input id="btn-edit-Video1" type="submit" class="btn btn-success edit-Video">
                            </form>
                            <form id="2" class="formVideos"  method="POST" action="ProxyEditVideos.php">
                                <label for="video2-Main" class="col-form-label">Video 2:</label>
                                <input  type="text" name="VIDEONAME" class="form-control" id="video2-Main">
                                <input  hidden type="text" name="VIDEONUM" value="2">
                                <input id="btn-edit-Video2" type="submit" class="btn btn-success edit-Video">
                            </form>
                        </div>
                    </div>

                </div>


                <div id="tab-usuarios">
                        <div id="btnAdd-Evento" class="btnAdd">
                            <button id="btnAgregarUsuario" type="button" data-bs-toggle="modal" data-bs-target="#ModalAddUsuario" class="btn-agregar-producto" ><i class="fas fa-plus-circle"></i> Agregar Usuario</button>
                        </div>
        
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-Admin">
                                <tr>
                                <th id="tHeadISBN"  class="text-center" scope="col">Nombre</th>
                                <th  class="text-center"  scope="col">Correo</th>
                                <th  class="text-center" scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    require_once("Conexion.php");
                                    $query = "SELECT * FROM usuarios";
                                    $resultado = mysqli_query($conexion,$query);
                                    $numRegistros = mysqli_num_rows($resultado);
                                ?>

                                <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                                    <tr class="tr-Admin">
                                        <td  class="text-center" scope="row"><?= $registro['Nombre'];?></td>
                                        <td  class="text-center"><?= $registro['Correo'];?></td>
                                        
                                        <td  id="<?= $registro['idUsuarios'];?>"  class="text-center container-actions">
                                            <i title="Ver detalles" data-bs-toggle="modal" data-bs-target="#ModalViewUsuario" class="fas fa-eye iconos-Acciones   icon-view-Usuario   icon-action-Admin"></i> 
                                            <i title="Editar"       data-bs-toggle="modal" data-bs-target="#ModalEditUsuario" class="fas fa-edit iconos-Acciones icon-edit-Usuario   icon-action-Admin"></i>
                                            <i title="Eliminar"     class="fas fa-trash icon-delete-Usuario iconos-Acciones icon-action-Admin"></i>
                                        </td>

                                    </tr>                
                                <?php endwhile;?>

                            </tbody>
                        </table>
                    </div>
                </div>

        </div>

        <?php
            include('Modals/addLibro.php');
            include('Modals/viewLibro.php');
            include('Modals/editLibro.php');
            include('Modals/addMedia.php');
            include('Modals/viewMedia.php');
            include('Modals/editMedia.php');
            include('Modals/addEvento.php');
            include('Modals/viewEvento.php');
            include('Modals/editEvento.php');
            include('Modals/addUsuario.php');
            include('Modals/viewUsuario.php');
            include('Modals/editUsuario.php');
            include('Modals/addBlog.php');
            include('Modals/viewBlog.php');
            include('Modals/editBlog.php');
            include('Modals/addNoticia.php');
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

            <?php  if($_GET['r'] == 4): ?>
                <script>
                    swal("Error","No se pudo agregar el libro al catálogo" , 'error');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 5): ?>
                <script>
                    swal("Error","No se pudo Modificar el libro." , 'error');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 6): ?>
                <script>
                    swal("","Se agregó el archivo correctamente." , 'success');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 7): ?>
                <script>
                    swal("Error","No se pudo agregar el archivo, tamaño maximo aceptado: 10MB" , 'error');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 8): ?>
                <script>
                    swal("","Se modificó el archivo correctamente." , 'success');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 9): ?>
                <script>
                    swal("Error","NO se modificó el archivo." , 'error');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 10): ?>
                <script>
                    swal("","Se modificó el Video correctamente." , 'success');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 11): ?>
                <script>
                    swal("Error","NO se modificó el Video." , 'error');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 12): ?>
                <script>
                    mostrarNotificacion('Se aregó el registro.', 'exito');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 13): ?>
                <script>
                    mostrarNotificacion('No se aregó el registro.', 'error');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 14): ?>
                <script>
                    mostrarNotificacion('Se editó el registro.', 'exito');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 15): ?>
                <script>
                    mostrarNotificacion('No se editó el registro.', 'error');
                </script>
            <?php endif; ?>

            <?php  if($_GET['r'] == 16): ?>
                <script>
                    mostrarNotificacion('Se eliminó el registro.', 'exito');
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