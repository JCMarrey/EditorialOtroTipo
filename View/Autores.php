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

    
    <title>Autores</title>
</head>


<body>
    <?php require_once("../common/header.php"); ?>

    <div class="contenedor-Autores">

        <h3 class="titulo-Autores" >Autores</h3>

        <div id="carouselExampleIndicators" class="carousel carousel-G slide" data-bs-ride="true">

            <div class="carousel-inner">
                <?php
                    require_once('Admin/Conexion.php');
                    $query = "SELECT Archivo FROM deotrotipo.media WHERE tipo = 'SEMBLANZA';";
                    $resultado = mysqli_query($conexion,$query);
                    $contador=0;
                    $numRegistros = mysqli_num_rows($resultado );
                ?>
                
                <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                    <?php if($contador==0): ?>
                        <?php $contador++; ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/EditorialOtroTipo/Media/Semblanzas/<?= $registro['Archivo']; ?>" alt="Banner Principal">
                            </div>
                    <?php else: ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/EditorialOtroTipo/Media/Semblanzas/<?= $registro['Archivo']; ?>" alt="Banner Principal">
                        </div>
                    <?php endif;?>
                <?php endwhile;?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>



            <div class="carousel-indicators">

                <?php $contadorAuxiliar=0; while($numRegistros>$contadorAuxiliar): ?>
                    <?php if($contadorAuxiliar==0): ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$contadorAuxiliar;?>" class="active" aria-current="true" aria-label="Slide <?=$contadorAuxiliar+1;?>"></button>
                        <?php else: ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$contadorAuxiliar;?>" aria-current="true" aria-label="Slide <?=$contadorAuxiliar+1;?>"></button>
                    <?php endif;?>
                <?php  $contadorAuxiliar++; endwhile;?>

            </div>
            
        </div>
    </div>



    <?php require_once("../common/footer.php"); ?>

</body>
</html>
