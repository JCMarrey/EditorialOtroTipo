<header class = "header">    
    
        <a href="http://localhost/EditorialOtroTipo/View/paginaPrincipal.php">
            <img class="logo" src="../Icons/logo.svg" alt="Logo Editorial" width="500" height="600">
        </a>
    
        <div class="search-container">
            <form action="#">
                <input type="text" placeholder="Buscar en catálogo" class="rounded search-input" name="search">
                <button type="submit" class ="icon-search"><i class="fa fa-search"></i></button>
            </form>
        </div>
    
        <div class="header-options">

            <div class="header-option1">
                <a type="button" href="/View/carrito.php">
                    <i class="fas fa-shopping-cart icono-header"></i>
                </a>
                <p>Carrito</p>
            </div>
            <div class="header-option">
                <a  href ="Ubicacion.php">
                    <i class="fa fa-map-marked icono-header" aria-hidden="true"></i>
                </a>
                
                <p>Ubicación</p>
            </div>
            <div class="header-option">
                <i class="fa fa-calendar icono-header" aria-hidden="true"></i>
                <p>Eventos</p>
            </div>
            <div class="header-option">
                   <a  href ="Contacto.php">
                        <i class="fa  fa-user icono-header"></i>
                    </a>
                    <p>Contacto</p>
            </div>
        </div>

</header>

    
<div class="navBar">
        

    <div class="navItem"><a href="/View/Quienes somos.php">Quienes somos</a></div>
    <div class="navItem"><a href="/View/catalogo.php">Catálogo</a></div>
    
               
    <div class="navItem">
            <button class="dropdown-toggle" onclick="myFunction()" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Servicios
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="/View/Servicios Editoriales.php">Servicios Editoriales</a></li>
                    <li><a class="dropdown-item" href="/View/Servicios Multimedia.php">Servicios Multimedia</a></li>
                    <li><a class="dropdown-item" href="/View/ServiciosdeComeInf.php">Servicios de comunicación e información</a></li>
                    <li><a class="dropdown-item" href="#">Traducciones</a></li>
            </ul>
        </div>

        <script>
            function myFunction() {
                document.querySelector("body > div > div:nth-child(3) > ul").style.margin = "10px 0px";
                document.querySelector("body > div > div:nth-child(3) > ul").style.border = "1px solid #CB123F";
            }
        </script>

        <div class="navItem"><a href="">Novedades</a></div>
        <div class="navItem"><a href="http://localhost/EditorialOtroTipo/View/Autores.php">Autores</a></div>
        <div class="navItem"><a href="">Diálogos con el autor</a></div>
        <div class="navItem"><a href="">Noticias</a></div>
        <div class="navItem"><a href="">Convocatorias</a></div>
        <div class="navItem"><a href="">Blog</a></div>


</div>


