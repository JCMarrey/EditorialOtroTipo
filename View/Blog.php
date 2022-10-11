<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <?php require_once("../common/head.php"); ?>


<body>
    <?php require_once("../common/header.php"); ?>

    <div class="contenedor-Autores">

        <h3 class="titulo-Autores" >Blog</h3>

        <?php
            require_once('Admin/Conexion.php');
            $query = "SELECT * FROM deotrotipo.blog;";
            $resultado = mysqli_query($conexion,$query);
        ?>
            
        <?php while($registro = mysqli_fetch_assoc($resultado)):?>
            <a href="http://localhost/EditorialOtroTipo/View/Entrada.php?r=<?=$registro['idBlog']?>">
                <div class="cuadroblog">
                    <img class="img-Blog" src="../Entradas/<?=$registro['Img']?>" alt="ImagenBlog">
                    <div class="tituloblog">
                        <h1><?=$registro['Titulo']?></h1>
                        <p id="nombre"><?=$registro['Autor']?></p>
                        <p id="fecha"><?=$registro['Fecha']?></p>
                        
                        <?php $myfile = fopen("../Entradas/".$registro['Preview'].".txt", "r") or die("Unable to open file!");?>
                        <p id="resumen"><?=fread($myfile,filesize("../Entradas/".$registro['Preview'].".txt"));?>...</p>
                        <?php fclose($myfile); ?>
                    </div>
                </div>
            </a>
        <?php endwhile;?>        
    </div>

    <?php require_once("../common/footer.php"); ?>

</body>
</html>
<!--
<div class="cuadroblog">

    <img src="../img/p1.jpg" alt="#">

    <div class="tituloblog">
        <h1>Consejos de Ernest Hemingway</h1>
        <p id="nombre">Ernest Hemingway</p>
        <p id="fecha">20 junio 2022</p>
        <p id="resumen">Escribe frases breves. Comienza siempre con una oración corta. Utiliza un inglés vigoroso. Sé positivo, no negativo. La jerga que adoptes debe ser reciente, de lo contrario no sirve...</p>
    </div>


</div>

-->