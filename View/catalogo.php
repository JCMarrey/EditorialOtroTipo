<?php

  require '../config/Database.php';

  $db = new Database();

  $con = $db->conectar();




  if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];
    $sql_libros= $con->prepare("SELECT*FROM deotrotipo.libro WHERE Coleccion='$categoria'");
    $sql_libros->execute();
    $result = $sql_libros->fetchAll(PDO::FETCH_ASSOC);
}else{
  $sql_libros = $con->query("SELECT*FROM deotrotipo.libro");
  $sql_libros->execute();
  $result = $sql_libros->fetchAll(PDO::FETCH_ASSOC);
}

  
?>

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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
        <title>Editorial Otro Tipo</title>
    </head>
  
    <body>


      <?php require_once("../common/header.php"); ?>
      <?php require_once("../common/carritoModal.php"); ?>


      <div class="filtros">
        <ul class="list-group">
          <li class="list-group-item">Filtrar por:</li>
            <li class="list-group-item">Categoria
                  <div class="btn-group dropend">
                      <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                        <span>+</span>
                      </button>
                      <ul class="dropdown-menu"  style="text-decoration: none;">

                        <?php
                           $sql_categorias = $con->prepare("SELECT DISTINCT Coleccion FROM deotrotipo.libro");
                           $sql_categorias->execute();
                           $resultCate = $sql_categorias->fetchAll(PDO::FETCH_ASSOC); 
                        
                        foreach($resultCate as $row){
                          $categoria=$row['Coleccion'];
                        ?>
                           
                           <li><a class="dropdown-item" href="catalogo.php?categoria=<?php echo $categoria;?>"><?php echo $categoria?></a></li>
                          
                        <?php    
                        }
                        ?>
                          <li><a class="dropdown-item" href="catalogo.php">Todos los libros</a></li>-->
                      </ul>
                  </div>
            </li>
            <li class="list-group-item">Precio</li>
            <li class="list-group-item">Firma
              <div class="btn-group dropend">
                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                          <span>+</span>
                        </button>
                        <ul class="dropdown-menu"  style="text-decoration: none;">
                          <li><a class="dropdown-item" href="#">Con autógrafo</a></li>
                          <li><a class="dropdown-item" href="#">Sin autógrafo</a></li>
                        </ul>
                  </div>
            </li>
        </ul>        
      </div>



      <div class="containerProductos"  id="lista-productos">
          <div class="catalogoP">
            <div class="row row-cols-1 row-cols-md-3 g-2 text-center ">
              <?php  foreach($result as $row) { ?>
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
                      <p class="card-text" id="pesoLibro" style="display:none;"><?php echo $row['Peso']?></p>
                      
                      <div class="d-grid gap-2 d-md-block" style="margin-bottom: 1rem;">                    
                        <!--<button class="btnS1"  type="button" id="btnLeerF"><a style="text-decoration: none;" target="_blank" href="/sinopsis/cuarta de forros Amar en otro idioma.pdf">Leer un fragmento</a></button>-->
                        
                        <button class="btnS1"  type="button" id="btnLeerF"><a style="text-decoration: none; color: blanchedalmond;" target="_blank" href="<?php echo $row['Capitulo1'];  ?>">Leer un fragmento</a></button>                  
                        <button class="btnS1" type="button" id="btnReproducirAudio"><a  href="detallesLibro.php?idLibro=<?php echo $row['idLibro'];?>"><img src="/Icons/boton_play.svg" alt=".." style="width: 35px;"></a></button>
                        
                      </div>
                      
                      <div class="d-grid gap-3 d-md-block">
                        <button class="btnS2 agregar-producto-c" type="button" onclick="Mostrar()"><img src="/Icons/carrito.svg" alt="..." style="width: 22px;" >Comprar</button>
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
                                         
          <!--div para sidebar de carrito-->

      <script src="/JS/animaciones.js" type="text/javascript"></script>
      <script src="/JS/funciones.js"></script>          
      <script src="/JS/jquery-3.4.1.min.js"></script>
      <?php require_once("../common/footer.php"); ?>
    </body>
</html>
