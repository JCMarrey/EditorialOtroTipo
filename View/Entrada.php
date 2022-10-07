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
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v15.0" nonce="Rp2S1Loo"></script>
    <script>window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
        }(document, "script", "twitter-wjs"));
    </script>

    <script>
        function copyToClipBoard() {
            navigator.clipboard.writeText(window.location.href);
            alert("Copied the text: " + window.location.href);
        }
    </script>
   
    <?php require_once("../common/header.php"); ?>

    <?php
        require_once('Admin/Conexion.php');
        $query = "SELECT * FROM deotrotipo.blog WHERE idBlog =".$_GET["r"];;
        $resultado = mysqli_query($conexion,$query);
        $registro = mysqli_fetch_assoc($resultado);
    ?>  

    <div  class="section">
        <div class="grid">


            <div id="cuadroleer1">

                <div id="tituloblog1">
                    <h1><?=$registro['Titulo']?></h1>
                    <p id="nombre"><?=$registro['Autor']?></p>
                    <p id="fecha"><?=$registro['Fecha']?></p>
                    
                    <div id="textoblog1">
                        <?php $myfile = fopen("../Entradas/".$registro['Entrada'].".txt", "r") or die("Unable to open file!");?>
                            <p><?=fread($myfile,filesize("../Entradas/".$registro['Entrada'].".txt"));?></p>
                        <?php fclose($myfile); ?>    
                        <div class="flex-container-E">
                            <p id="compartir">Compartir</p>
                            
                               <img id="img1" onclick="copyToClipBoard()" src="../Icons/compartirrojo.svg" alt="">
                            
                            <!-- <img id="img1" src="../Icons/twitterrojo.svg" alt="">
                            <img id="img1" src="../Icons/fbrojo.svg" alt="">
                            <img id="img1" src="../Icons/instarojo.svg" alt=""> -->
                            <div class="fb-share-button" data-href="https://neubox.com/" data-layout="button_count" data-size="small">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                </a>
                            </div>
                            <a class="twitter-share-button"
                                href="#"
                                data-size="large">
                                Tweet
                            </a>
                        </div>
                    </div>
                    <img src="../Entradas/<?=$registro['Img']?>" alt="#">
                </div>
            </div>


            </div>        
        </div>
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