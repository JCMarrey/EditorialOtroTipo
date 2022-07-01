<?php

    require '../config/Database.php';

    $db = new Database();

    $con = $db->conectar();
    //ordenar los valores porque salen en forma desordenada.. ordenamiento descentente para escoger los últimos n libros..

    $sql_novedades= $con->prepare("SELECT*FROM deotrotipo.libro ORDER BY idLibro DESC");
    $sql_novedades->execute();
    //$result = $sql_novedades->fetchAll(PDO::FETCH_ASSOC);
    

    $arreglo = array();
    $contador = 3; //cambiar por 10, una vez que se suba la BD
    foreach($sql_novedades as $elemento){
        if(sizeof($arreglo) != $contador ){
            array_push($arreglo,$elemento);
        }
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <?php require_once("../common/head.php"); ?>
<body>
    <?php require_once("../common/header.php"); ?>
    <div class="contenedor-main1">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">

            <div class="carousel-inner">
                <?php
                    require_once('Admin/Conexion.php');
                    $query = "SELECT Archivo FROM deotrotipo.media WHERE tipo = 'CARRUSEL';";
                    $resultado = mysqli_query($conexion,$query);
                    $contador=0;
                    $numRegistros = mysqli_num_rows($resultado );
                ?>
                
                <?php while($registro = mysqli_fetch_assoc($resultado)):?>
                    <?php if($contador==0): ?>
                        <?php $contador++; ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/EditorialOtroTipo/Media/CarruselMain/<?= $registro['Archivo']; ?>" alt="Banner Principal">
                            </div>
                    <?php else: ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/EditorialOtroTipo/Media/CarruselMain/<?= $registro['Archivo']; ?>" alt="Banner Principal">
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
    <div class="contenedorIconos">
            <a href="https://www.instagram.com/deotrotipo/" target="_blank" ><i class="fab fa-instagram iconoRedes"></i></a>
            <a href="https://www.facebook.com/editorial.deotrotipo" target="_blank" ><i class="fab fa-facebook-square iconoRedes"></i></a> 
            <a href=" https://twitter.com/d_otrotipo" target="_blank" ><i class="fab fa-twitter-square iconoRedes"></i></a>
            <a href=" https://www.youtube.com/user/deotrotipo" target="_blank" ><i class="fab fa-youtube iconoRedes"></i></a>
        </div>
    </div>

    <div id="contenedor-main2">
        <?php
            $query = "SELECT * FROM deotrotipo.media WHERE tipo != 'CARRUSEL' AND tipo != 'SEMBLANZA';";
            $resultado = mysqli_query($conexion,$query);
        ?>
            
        <?php while($registro = mysqli_fetch_assoc($resultado)):?>
            <iframe width="420" height="345" class="anuncios-main" src="<?=$registro['Archivo']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php endwhile;?>

    </div>

            <!--sección para cargar los libros de novedades...-->
            <div class="containerProductos"  id="lista-productos">
              <div class="catalogoP">
                <div class="row row-cols-1 row-cols-md-3 g-2 text-center ">
                  <?php  foreach($arreglo as $row) { ?>
                    <div class="col">
                      <div class="card" >          
                        <div class="card-body">
                          <div class="figure">
                              <div class="capa">
                                  <h4 id="firmaAutor">LibroFirmado</h3>
                                      <p id="textoPDF">
    
                                        <?php
                                            $sufijo = "...";
                                            $Sinopsis = $row['Sinopsis'];
                                            $AuxTexto = "";
                                            $contents=file_get_contents($Sinopsis);
                                            $lines=explode("\n",$contents);
                                            foreach($lines as $line){
                                                $AuxTexto = $AuxTexto . $line;
                                            }
                                            //cadena de 30 carácteres...
                                            if( strlen($AuxTexto) > 100 ){
                                                $AuxTexto = substr($AuxTexto,0,100) .$sufijo;
                                                echo $AuxTexto;
                                            }else{
                                              echo $AuxTexto;  
                                            }            
                                        ?>
                                          <button class="btnVermas" id="btnVermas" ><a href="/View/detallesLibro.php?idLibro=<?php echo $row['idLibro']; ?>">Ver más..</a></button>  
                                        <!---->
                                      </p>
                              </div>
         
                            <img  class="card-img-top" src="<?php echo  $row['Imagen']; ?>" > 
                        </div> 
                        <div>
                          <img  style="display:none" class="card-img-top" src="<?php echo $row['Imagen']; ?>"> 
                          <h5 class="card-title" id="nombreLibro"> <?php echo $row ['Titulo']; ?> </h5>
                          <p classs="card-text" id="autor"><?php echo $row['Autor']?></p>
                          <p class="card-text" id="precio"  style="display:none;">$<span> <?php echo number_format($row['Precio'],2,'.',','); ?> </span></p>
                          <h2 class="card-text" id="pesoLibro" style="display:none;"><?php echo $row['Peso']?></h2>
                          
                          <div class="d-grid gap-2 d-md-block" style="margin-bottom: 1rem;">                    
                            <!--<button class="btnS1"  type="button" id="btnLeerF"><a style="text-decoration: none;" target="_blank" href="/sinopsis/cuarta de forros Amar en otro idioma.pdf">Leer un fragmento</a></button>-->
                            
                            <button   type="button" id="btnLeerF"><a style="text-decoration: none; color: blanchedalmond;" target="_blank" href="<?php echo $row['Capitulo1'];  ?>">Leer un fragmento</a></button>                  
                            
                            <button class="btnS1" type="button" id="btnReproducirAudio"><a  href="detallesLibro.php?idLibro=<?php echo $row['idLibro'];?>"><img src="/Icons/boton_play.svg" alt=".." style="width: 35px;"></a></button>
                            
                          </div>
                          <div class="d-grid gap-3 d-md-block">
                          <button class="btnS2" id="btnVermas" >
                            <a href="/View/detallesLibro.php?idLibro=<?php echo $row['idLibro']; ?>">
                                  <p id="verMasP">Ver más</p>
                            </a>
                          </button> 
                            <ul id="idProducto" style="display:none";>
                              <li><?php echo $row['idLibro'] ?><li>
                            </ul>
                            <!--<p class="idProducto" style="display:none"; id="producto-id">1</p>-->
                          </div>
                        </div>
                      </div>
                    </div>
                </div>  
                <?php } ?>
              </div>
            </div>
            </div>

          <div class="botonVermas" >
            <button class = "botonVermasF">
              <a id="txtVerMas" type="button"  href="/View/catalogo.php" >Ver más libros<a/>
            </button> 
          </div>

      <script src="/JS/animaciones.js" type="text/javascript" defer></script>
      <script src="/JS/funciones.js" defer></script>
      <script src="/JS/compra.js" defer></script>     
      <script src="/JS/jquery-3.4.1.min.js"></script>
      <?php require_once("../common/footer.php"); ?>
</body>

</html>
