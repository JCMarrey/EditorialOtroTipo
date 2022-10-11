<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <?php require_once("../common/head.php"); ?>


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
        <div id="cuadroleer1">
            <div id="tituloblog1">
                <h1><?=$registro['Titulo']?></h1>
                <p id="nombre"><?=$registro['Autor']?></p>
                <p id="fecha"><?=$registro['Fecha']?></p>
                
                <div id="contenidoBlog">
                    <img class="toggle-img1" src="../Entradas/<?=$registro['Img']?>" alt="#">

                    <div id="textoblog1">
                        <?php $myfile = fopen("../Entradas/".$registro['Entrada'].".txt", "r") or die("Unable to open file!");?>
                            <p class="texto-justificado"><?=fread($myfile,filesize("../Entradas/".$registro['Entrada'].".txt"));?></p>
                        <?php fclose($myfile); ?>    
                        <div class="flex-container-E">
                            <p id="compartir">Compartir</p>
                        
                            <img id="img1" onclick="copyToClipBoard()" src="../Icons/compartirrojo.svg" alt="">
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
                </div>


            </div>
        </div>  
    </div>
    

    <?php require_once("../common/footer.php"); ?>

</body>
</html>
