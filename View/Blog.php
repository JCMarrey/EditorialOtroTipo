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
    <link rel="stylesheet" href="../common/estilosCarrito.css">

    
    <title>Blog</title>
</head>


<body>
    <?php require_once("../common/header.php"); ?>

    <div class="contenedor-Autores">

        <h3 class="titulo-Autores" >Blog</h3>



            <div id="cuadroblog1">

                <img src="../img/p1.jpg" alt="#">

                <div id="tituloblog">
                    <h1>Consejos de Ernest Hemingway</h1>
                    <p id="nombre">Ernest Hemingway</p>
                    <p id="fecha">20 junio 2022</p>
                    <p id="resumen">Escribe frases breves. Comienza siempre con una oración corta. Utiliza un inglés vigoroso. Sé positivo, no negativo. La jerga que adoptes debe ser reciente, de lo contrario no sirve...</p>
                </div>


            </div>

        <?php
            require_once('Admin/Conexion.php');
            $query = "SELECT * FROM deotrotipo.blog;";
            $resultado = mysqli_query($conexion,$query);
        ?>
            
        <?php while($registro = mysqli_fetch_assoc($resultado)):?>
            <div class="Blog">
                <img class="img-Blog" src="../Entradas/<?=$registro['img']?>" alt="ImagenBlog">
                <div class="info-Blog">
                    <p><?=$registro['Fecha']?></p>
                    <p><?=$registro['info']?></p>
                </div>
            </div>

            
        <?php endwhile;?>








        
    </div>



    <?php require_once("../common/footer.php"); ?>

</body>
</html>
