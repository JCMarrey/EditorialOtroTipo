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
      <div id="carrito">
        <table id="lista-carrito" class="table">
          <thead>
            <tr>
              <th>
                <button class="btnS2"  type="button" onclick="Ocultar()"  id="btnOcultarNB" >X</button>
              </th>
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th></th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
        <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar Compra</a>
      </div>
      <?php require_once("../common/header.php"); ?>
      
      <div class="containerProductos" id="lista-productos">
          <div class="catalogoP">
            <div class="row row-cols-1 row-cols-md-3 g-2 text-center " >
              <div class="col">
                <div class="card" >          
                  <div class="card-body" producto-id="1">
                    <div class="figure">
                          <div class="capa">
                              <h4 id="firmaAutor">LibroFirmado</h3>
                                  <p id="textoPDF">Lorem ddipsum dolor sit amet consectetur adipisicing elit. Nobis rerum fugiat labore laudantium! Eveniet dolore totam dolores officia obcaecati labore laborum a 
                                      <button class="btn" ><a href="/View/detallesLibro.php">Ver más..</a></button>  
                                    <!---->
                                  </p>
                          </div>
                          <img  class="card-img-top" src="/img/p1.jpg"  alt="...">    
                    </div>  
                    <h5 class="card-title" id="nombreLibro">NombreLibro</h5>
                    <p classs="card-text" id="autor">Autor</p>
                    <p class="card-text" id="precio"  style="display:none;">$<span>500</span></p>
                    <p class="card-text" id="pesoLibro" style="display:none;">kg</p>
                      
                    <div class="d-grid gap-2 d-md-block" style="margin-bottom: 1rem;">
                      <button class="btnS1"  type="button" id="btnLeerF"><a href="https://es-la.facebook.com/"></a>Leer un fragmento</button>
                      <button class="btnS1" type="button" id="btnReproducirAudio"><a href="https://es-la.facebook.com/" ><img src="/Icons/boton_play.svg" alt=".." style="width: 35px;"></a></button>
                    </div>
                    
                    <div class="d-grid gap-3 d-md-block">
                      <button class="btnS2 agregar-producto-c"  type="button" id="btnComprar" onclick="Mostrar()"><img src="/Icons/carrito.svg" alt="..." style="width: 22px;" >Comprar</button>
                      <p style="display:none"; id="producto-id">1</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" >
                      <div class="figure">
                          <div class="capa">
                              <h4 id="firmaAutor">LibroFirmado</h3>
                                  <p id="textoPDF">Lorem ddipsum dolor sit amet consectetur adipisicing elit. Nobis rerum fugiat labore laudantium! Eveniet dolore totam dolores officia obcaecati labore laborum a 
                                      <a href="#">Ver más..</a>
                                  </p>
                          </div>
                          <img  class="card-img-top" src="/img/p1.jpg" class="card-img-top" alt="...">    
                      </div>   
                              
                  <div class="card-body">
                    <h5 class="card-title" id="nombreLibro">NombreLibro</h5>
                    <p classs="card-text" id="autor">Autor</p>
                    <p class="card-text" id="precio">$<span>500</span></p>
                      
                    <div class="d-grid gap-2 d-md-block" style="margin-bottom: 1rem;">
                      <button class="btnS1"  type="button"><a href="#"></a>Leer un fragmento</button>
                      <button class="btnS1" type="button"><a href="https://es-la.facebook.com/" ><img src="/Icons/boton_play.svg" alt=".." style="width: 35px;"></a></button>
                    </div>
                    
                    <div class="d-grid gap-3 d-md-block">
                      <button class="btnS2"  type="button" ><img src="/Icons/carrito.svg" alt="..." style="width: 22px;"><a href="#"></a> Comprar</button>   
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" >
                      <div class="figure">
                          <div class="capa">
                              <h4 id="firmaAutor">LibroFirmado</h3>
                                  <p id="textoPDF">Lorem ddipsum dolor sit amet consectetur adipisicing elit. Nobis rerum fugiat labore laudantium! Eveniet dolore totam dolores officia obcaecati labore laborum a 
                                      <a href="#">Ver más..</a>
                                  </p>
                          </div>
                          <img  class="card-img-top" src="/img/p1.jpg" class="card-img-top" alt="...">    
                      </div>   
                              
                  <div class="card-body">
                    <h5 class="card-title" id="nombreLibro">NombreLibro</h5>
                    <p classs="card-text" id="autor">Autor</p>
                      
                    <div class="d-grid gap-2 d-md-block" style="margin-bottom: 1rem;">
                      <button class="btnS1"  type="button"><a href="#"></a>Leer un fragmento</button>
                      <button class="btnS1" type="button"><a href="https://es-la.facebook.com/" ><img src="/Icons/boton_play.svg" alt=".." style="width: 35px;"></a></button>
                    </div>
                    
                    <div class="d-grid gap-3 d-md-block">
                      <button class="btnS2"  type="button"  id="btnComprar"><img src="/Icons/carrito.svg" alt="..." style="width: 22px;"><a href="#"></a> Comprar</button>   
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" >
                      <div class="figure">
                          <div class="capa">
                              <h4 id="firmaAutor">LibroFirmado</h3>
                                  <p id="textoPDF">Lorem ddipsum dolor sit amet consectetur adipisicing elit. Nobis rerum fugiat labore laudantium! Eveniet dolore totam dolores officia obcaecati labore laborum a 
                                      <a href="/View/detallesLibro.php">Ver más..</a>
                                  </p>
                          </div>
                          <img  class="card-img-top" src="/img/p1.jpg" class="card-img-top" alt="...">    
                      </div>   
                              
                  <div class="card-body">
                    <h5 class="card-title" id="nombreLibro">NombreLibro</h5>
                    <p classs="card-text" id="autor">Autor</p>
                      
                    <div class="d-grid gap-2 d-md-block" style="margin-bottom: 1rem;">
                      <button class="btnS1"  type="button"><a href="#"></a>Leer un fragmento</button>
                      <button class="btnS1" type="button"><a href="https://es-la.facebook.com/" ><img src="/Icons/boton_play.svg" alt=".." style="width: 35px;"></a></button>
                    </div>
                    
                    <div class="d-grid gap-3 d-md-block">
                      <button class="btnS2"  type="button"  id="btnComprar"><img src="/Icons/carrito.svg" alt="..." style="width: 22px;"><a href="#"></a> Comprar</button>   
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" >
                      <div class="figure">
                          <div class="capa">
                              <h4 id="firmaAutor">LibroFirmado</h3>
                                  <p id="textoPDF">Lorem ddipsum dolor sit amet consectetur adipisicing elit. Nobis rerum fugiat labore laudantium! Eveniet dolore totam dolores officia obcaecati labore laborum a 
                                      <a href="/View/detallesLibro.php">Ver más..</a>
                                  </p>
                          </div>
                          <img  class="card-img-top" src="/img/p1.jpg" class="card-img-top" alt="...">    
                      </div>   
                              
                  <div class="card-body">
                    <h5 class="card-title" id="nombreLibro">NombreLibro</h5>
                    <p classs="card-text" id="autor">Autor</p>
                      
                    <div class="d-grid gap-2 d-md-block" style="margin-bottom: 1rem;">
                      <button class="btnS1"  type="button"><a href="#"></a>Leer un fragmento</button>
                      <button class="btnS1" type="button"><a href="https://es-la.facebook.com/" ><img src="/Icons/boton_play.svg" alt=".." style="width: 35px;"></a></button>
                    </div>
                    
                    <div class="d-grid gap-3 d-md-block">
                      <button class="btnS2"  type="button"  id="btnComprar"><img src="/Icons/carrito.svg" alt="..." style="width: 22px;"><a href="#"></a> Comprar</button>   
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" >
                      <div class="figure">
                          <div class="capa">
                              <h4 id="firmaAutor">LibroFirmado</h3>
                                  <p id="textoPDF">Lorem ddipsum dolor sit amet consectetur adipisicing elit. Nobis rerum fugiat labore laudantium! Eveniet dolore totam dolores officia obcaecati labore laborum a 
                                      <a href="/View/detallesLibro.php">Ver más..</a>
                                  </p>
                          </div>
                          <img  class="card-img-top" src="/img/p1.jpg" class="card-img-top" alt="...">    
                      </div>   
                              
                  <div class="card-body">
                    <h5 class="card-title" id="nombreLibro">NombreLibro</h5>
                    <p classs="card-text" id="autor">Autor</p>
                      
                    <div class="d-grid gap-2 d-md-block" style="margin-bottom: 1rem;">
                      <button class="btnS1"  type="button"><a href="#"></a>Leer un fragmento</button>
                      <button class="btnS1" type="button"><a href="https://es-la.facebook.com/" ><img src="/Icons/boton_play.svg" alt=".." style="width: 35px;"></a></button>
                    </div>
                    
                    <div class="d-grid gap-3 d-md-block">
                      <button class="btnS2"  type="button"  id="btnComprar"><img src="/Icons/carrito.svg" alt="..." style="width: 22px;"><a href="#"></a> Comprar</button>   
                    </div>
                  </div>
                </div>
              </div>
            </div>   
          </div> 
          <!--div para sidebar de carrito-->
          
      </div>
      
      <script src="/JS/animaciones.js" type="text/javascript"></script>
      <script src="/JS/funciones.js" type="module"></script>
    </body>
</html>
