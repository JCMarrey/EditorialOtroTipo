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

    <?php  require_once("../common/head.php"); ?>
    <body>

     
    <?php require_once("../common/header.php"); ?>
      <div id="carrito">
        <div>
          <table id="lista-carrito" class="table" >
            <tittle id="TextoCarritoCompras"><h1>Mi carrito de compras</h1></tittle>
            <thead>
              <tr>
                <th>
                  <button class="btnS2"  type="button" onclick="Ocultar()"  id="btnOcultarNB" >X</button>
                </th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
          <a  href="#" id="procesar-pedido" class="btn btn-primary btn-lg" style="margin-left:20rem;">Procesar Compra</a>
    
          <a  href="#" id="vaciar-carrito"  class="btn btn-danger btn-lg"  style="margin-left:10rem;">Vaciar Carrito</a>
        </div>

 
      <div class="containerProductos"  id="lista-productos">
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


          <div class="catalogoP">
            <div class="row  text-center ">
              <?php  foreach($result as $row) { ?>
                <div class="col-12 col-sm-4 col-md-6 col-lg-4">
                  <div class="card" >          
                    <div class="card-body">
                      <div class="figure">
                          <div class="capa">
                              <h3 id="firmaAutor">
                                <?php
                                   if($row['Firma'] == 'FIRMADO'){
                                      echo 'LibroFirmado';
                                   }else{
                                    echo 'LibroSinFirma';     
                                   }
                                  
                                ?>

                              </h3>
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
                                      <button class="btnVermas" id="btnVermas" ><a id="aVermas" href="/View/detallesLibro.php?idLibro=<?php echo $row['idLibro']; ?>">Ver más..</a></button>  
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
                            
                        <button class="btnS2 agregar-producto-c" type="button" onclick="Mostrar()">
                          <img  class="agregar-producto-B" src="/Icons/carrito.svg" alt="..." style="width: 22px;" >Comprar
                        </button>
                        <!--<button class="btnVermas2" id="btnVermas" ><a href="/View/detallesLibro.php?idLibro=<?/*php echo $row['idLibro']; */?>">Ver más..</a></button>-->
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

      <script src="/JS/animaciones.js" type="text/javascript" defer></script>
      <script src="/JS/funciones.js" defer></script>
      <script src="/JS/compra.js" defer></script>    
      <script src="/JS/carritoCompra.js" defer></script>   
      <script src="/JS/jquery-3.4.1.min.js"></script>
      <?php require_once("../common/footer.php"); ?>
    </body>
</html>
