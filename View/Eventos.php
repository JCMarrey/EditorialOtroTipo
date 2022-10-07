<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../FontAwesome/css/all.css">

    <link rel="stylesheet" href="../common/Normalize.css">
    
    <link rel="stylesheet" href="../common/estilos.css">

    
    <title>Eventos</title>
</head>


<body>
    <?php require_once("../common/header.php"); ?>

    <div class="contenedor-Autores">

        <h3 class="titulo-Autores" > Noticias </h3>

    <section>
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
        <div class="swiper-pagination"></div>

    </section>
    
     <!-- Swiper JS -->
     <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    slidesPerGroup: 4,
    loop: true,
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

 <!-- Link Swiper's CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
            
    <?php require_once("../common/footer.php"); ?>

</body>
</html>
