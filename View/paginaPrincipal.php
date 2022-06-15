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

    
    <title>Editorial Otro Tipo</title>
</head>


<body>
    <?php require_once("../common/header.php"); ?>

    <div class="contenedor-main1">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>

            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/p1.jpg" class="d-block w-100" alt="slide1">
                </div>
                <div class="carousel-item">
                    <img src="../img/p1.jpg" class="d-block w-100" alt="slide2">
                </div>
                <div class="carousel-item">
                    <img src="../img/p1.jpg" class="d-block w-100" alt="slide3">
                </div>
                <div class="carousel-item">
                    <img src="../img/p1.jpg" class="d-block w-100" alt="slide4">
                </div>
                <div class="carousel-item">
                    <img src="../img/p1.jpg" class="d-block w-100" alt="slide5">
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            
        </div>
    
        
        <div class="contenedorIconos">
            <a href="#" target="_blank" ><i class="fab fa-instagram iconoRedes"></i></a>
            <a href="#" target="_blank" ><i class="fab fa-facebook-square iconoRedes"></i></a> 
            <a href="#" target="_blank" ><i class="fab fa-twitter-square iconoRedes"></i></a>
            <a href="#" target="_blank" ><i class="fab fa-youtube iconoRedes"></i></a>
        </div>
    </div>

    <div id="contenedor-main2">
        <img src="../img/p1.jpg" alt="" class="anuncios-main">
        <img src="../img/p1.jpg" alt="" class="anuncios-main">
    </div>

    <?php require_once("../common/footer.php"); ?>

</body>
</html>
