<!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <?php require_once("../common/head.php"); ?>
    <body>
        <?php require_once("../common/header.php"); ?>

        <div class="contenedor-Autores">

            <h3 class="titulo-Autores" > Noticias </h3>

            <section>
            <div class="swiper-pagination"></div>
                <div class="swiper mySwiper containernot">
                    <div class="swiper-wrapper contentnot">

                    <?php
                        require_once('Admin/Conexion.php');
                        $query = "SELECT * FROM deotrotipo.noticia;";
                        $resultado = mysqli_query($conexion,$query);
                    ?>

                    <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                        <div class="swiper-slide cardnot">
                            <a href="<?=$registro['Url']?>" target="_blank">
                                <div class="card-contentnot">
                                    <div class="imagenot">
                                        <img src="../Media/LogosPortales/<?=$registro['LogoPortal']?>" alt="">
                                        <div class="titulonot">
                                            <span class="fechanot"><?=$registro['Fecha']?></span><br>
                                            <span class="noticianot"><?=$registro['Titulo']?></span><br>
                                            <span class="autornot"><?=$registro['Autor']?></span><br><br>
                                            <span class="resumenot"><?=$registro['Resumen']?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile;?>  

                    </div>    
                </div>



                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                

            </section>
            

            <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
            <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 4,
                spaceBetween: 30,
                slidesPerGroup: 4,
                loop: false,
                loopFillGroupWithBlank: true,
                pagination: {
                el: ".swiper-pagination",
                clickable: true,
                },
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                },
            });
            </script>
            
            <script src="../JS/swiperResponsive.js"></script>

            <h3 class="titulo-Autores" > Eventos </h3>
                <?php
                    require_once('Admin/Conexion.php');
                    $query = "SELECT * FROM deotrotipo.evento;";
                    $resultado = mysqli_query($conexion,$query);
                ?>
                    
                <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                    <div class="evento">
                        <img class="img-Evento" src="../Media/Eventos/<?=$registro['img']?>" alt="ImagenEvento">
                        <img src="../Media/Eventos/" alt="">
                        <div class="info-evento">
                            <p><?=$registro['Fecha']?></p>
                            <p class="parrafo-Eventos"><?=$registro['info']?></p>
                        </div>
                    </div>
                <?php endwhile;?>
        </div>
            <?php require_once("../common/footer.php"); ?>
        </body>
</html>