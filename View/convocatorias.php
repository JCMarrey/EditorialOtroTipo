<!DOCTYPE html>
    <html lang="en">
    <?php require_once("../common/head.php"); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    
 

    <body>
        <?php require_once("../common/header.php"); ?>

        <div class="convocatorias form-bg">


                    <?php
                        require_once('Admin/Conexion.php');
                        $query = "SELECT * FROM `convocatorias` WHERE IdConvocatoria = 1;";
                        $resultado = mysqli_query($conexion,$query);
                        $registro = mysqli_fetch_assoc($resultado);

                        $AuxTexto = "";
                        $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/EditorialOtroTipo/Convocatoria/".$registro['Texto'];
                        $contents=file_get_contents($carpetaDestino);
                        $lines=explode("\n",$contents);
                        foreach($lines as $line){
                            $AuxTexto = $AuxTexto . $line."<br>";
                        }
                    ?>

            <h1 id="titulo" class="fuente-pacifico"><?=$registro['Titulo']?></h1>
            
            
            <img src="../Convocatoria/<?=$registro['Imagen']?>" class="imgC" alt="ImagenConvocatoria">
          
            <br><br>
            <h2 id="subtitulo" class="subtituloE"><?=$registro['SubTitulo']?></h2>
            <br><br>

            <div id="descripcion" class="texto"><?= $AuxTexto ?></div>
            
                
        </div>

        <?php require_once("../common/footer.php"); ?>

    </body>
</html>
