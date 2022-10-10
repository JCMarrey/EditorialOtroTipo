<script src="../JS/celView.js"></script>

<header class = "header">    
        <a href="http://localhost/EditorialOtroTipo/View/paginaPrincipal.php">
            <img class="logo" src="../Icons/logo.svg" alt="Logo Editorial" width="500" height="600">
        </a>
    
        <div class="search-container">
            <form action="../View/resultadoBusqueda.php" method="POST" enctype = "multipart/form-data">
                <input type="text" placeholder="Buscar en catálogo" class="rounded search-input" name="titulo">
                <button type="submit" class ="icon-search"><i class="fa fa-search"></i></button>
            </form>
        </div>
    
        <div class="header-options">

            <div class="header-option">
                <i class="fas fa-shopping-cart icono-header"></i>
                <a type="button" href="/EditorialOtroTipo/View/carrito.php"></a>
                <p>Carrito</p>
            </div>
            <div class="header-option">
                <a  href ="Ubicacion.php">
                    <i class="fa fa-map-marked icono-header" aria-hidden="true"></i>
                </a>
                
                <p>Ubicación</p>
            </div>

            <div class="header-option">
                   <a  href ="Contacto.php">
                        <i class="fa  fa-user icono-header"></i>
                    </a>
                    <p>Contacto</p>
            </div>

            <div class="header-option">
                <i class="fa fa-calendar icono-header" aria-hidden="true"></i>
                <p>Eventos y Noticias</p>
            </div>
        </div>

        <p id="sideNav" class="burguer-menu-icon">
            <i class="fas fa-bars"></i>
        </p>
        

</header>

    
<div class="navBar sidenav">
        
    <a href="javascript:void(0)" class="closebtn" id="closeSideNav" >&times;</a>

    <div class="navItem"><a href="/View/Quienes somos.php">Quienes somos</a></div>
    <div class="navItem"><a href="http://localhost/EditorialOtroTipo/View/catalogo.php">Catálogo</a></div>
    
    <div class="navItem"><a href="">Servicios Editoriales</a></div>

    <!-- <div class="navItem"><a href="">Novedades</a></div> -->
    <div class="navItem"><a href="http://localhost/EditorialOtroTipo/View/Autores.php">Autores</a></div>
    <div class="navItem"><a href="">Diálogos con el autor</a></div>
    <div class="navItem"><a href="">Convocatorias</a></div>
    <div class="navItem"><a href="">Blog</a></div>


</div>        




