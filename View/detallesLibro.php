<?php

  require '../config/Database.php';

  $db = new Database();

  $con = $db->conectar();

$idLibro = isset($_GET['idLibro']) ?  $_GET['idLibro'] : '';

if($idLibro == ''){
    echo 'No existe el producto';
    exit;
}else{
    $sql_detalleLibro= $con->prepare("SELECT count(idLibro) FROM deotrotipo.libro WHERE idLibro=? ");
    //SELECT*FROM deotrotipo.libro WHERE Coleccion = "Ficción De Otro Tipo";
    $sql_detalleLibro->execute([$idLibro]);
    //verificamos que exista al menos 1 elemento con ese ID:
    if($sql_detalleLibro->fetchColumn() >0){
        $sql_detalleLibro= $con->prepare("SELECT Titulo, Precio, Imagen, Sinopsis, Autor, ISBN, Coleccion, Edicion, Paginas , Audio , Peso, Gandhi, Sotano, Porrua, CarlosFuentes, Amazon FROM deotrotipo.libro WHERE idLibro=? ");
        $sql_detalleLibro->execute([$idLibro]);
        $row = $sql_detalleLibro->fetch(PDO::FETCH_ASSOC);

        $Titulo = $row['Titulo'];
        $Precio = $row['Precio'];
        $Imagen = $row['Imagen'];
        $Sinopsis = $row['Sinopsis'];
        $Autor = $row['Autor'];
        $ISBN = $row['ISBN'];
        $Coleccion = $row['Coleccion'];
        $Edicion = $row['Edicion'];
        $Paginas = $row['Paginas'];
        $Audio = $row['Audio'];
        $Peso = $row['Peso'];

        $AuxTexto = "";
        $contents=file_get_contents($Sinopsis);
        $lines=explode("\n",$contents);
        foreach($lines as $line){
         $AuxTexto = $AuxTexto . $line;
        }
        
        $Amazon = $row['Amazon'];
        $Porrua = $row['Porrua'];
        $CarlosFuentes = $row['CarlosFuentes'];
        $Gandhi = $row['Gandhi'];
        $Sotano = $row['Sotano'];

        function evaluar($link){
            $estilos = ["Comprar","green"];
            if($link === NULL){
                return  $estilos =["No disponible","BECABC"];
            }else{
                return $estilos;
            }
        }

    }
        
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
   <div class="detallesLibro">
        <div class="asideIzq" id="lista-productos">
                    <div class="card-body">
                        <img  class="rounded mx-auto d-block" src="<?php echo  $row['Imagen']; ?>" > 
                    </div> 
                      <img  style="display:none" class="card-img-top" src="<?php echo $row['Imagen']; ?>"> 
                      <h5 class="card-title" id="nombreLibro"> <?php echo $row ['Titulo']; ?> </h5>
                      <p classs="card-text" id="autor"><?php echo $row['Autor']?></p>
                      <p class="card-text" id="precio"  style="font-size: 4rem;" >$<span> <?php echo number_format($row['Precio'],2,'.',','); ?> </span></p>
                      <h2 class="card-text" id="pesoLibro" style="display:none;"><?php echo $Peso?></h2>

                      <div>
                        <button class="btnS2 agregar-producto-c" type="button" onclick="Mostrar()"><img src="/Icons/carrito.svg" alt="..." style="width: 22px;" >Comprar</button>
                        <ul id="idProducto" style="display:none";>
                          <li><?php echo $idLibro ?><li>
                        </ul>

                     </div>
        </div>            
           <!-- Button trigger modal -->

        <div class="btn-tiendas">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTiendas">
                <h3>Puedes encontrarlo en (Dar Click)</h3>
            </button>
        </div>

    <!---MODAL PARA VER LAS TIENDAS--->

        <!-- Modal -->
    <div class="modal fade" id="modalTiendas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Editorial De Otro Tipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modalContenidoLibro">
                        <div id="nombreAutor" style="padding-bottom: 30px; padding-top: 30px;">
                            <?php echo $Autor ?>
                        </div>
                        <div>
                            <img class="imgModal" src="<?php echo $Imagen ?>" alt="...">
                        </div>
                        <div id="modalTitulo" style="padding-bottom: 30px; padding-top: 30px;">
                            <?php echo $Titulo ?>
                        </div>
                        <h2 class="card-text" id="pesoLibro" style="display:none;"><?php echo $row['Peso']?></h2>
                            
                        <div id="modalPrecio" style="font-size: 5rem">$<?php  echo $Precio?></div> 
                    </div>
                    <div class="modalTabla">
                      
                        <table class="table table-borderless"  >
                            <tittle> <h3>Elige tu tienda favorita:<h3> </tittle>
                            <tbody>
                                <tr>
                                    <td id="iconoGandhi">
                                        <img src="/Icons/logo-gandhi.jpg" alt = "... ">
                                    </td>
                                
                                    <td id="Gandhi">
                                        <?php 
                                                $cadena = evaluar($Gandhi);
                                                implode(", ", $cadena);
                                        ?>
                                        <a href="<?php echo $Gandhi ?>" class="btn  btn-lg btn-primary"  tabindex="-1" role="button" aria-disabled="true" style="background-color: <?php echo $cadena[1];?>" > <?php echo  $cadena[0]; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="iconoSotano">
                                        <img src="/Icons/logo-sotano.jpg" alt="" >
                                    </td>
                                
                                    <td id="Sotano">
                                        <?php 
                                                $cadena = evaluar($Sotano);
                                                implode(", ", $cadena);
                                        ?>
                                        <a href="<?php echo $Sotano ?>" class="btn  btn-lg btn-primary"  tabindex="-1" role="button" aria-disabled="true" style="background-color: <?php echo $cadena[1];?>" > <?php echo  $cadena[0]; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="iconoPorrua">
                                        <img src="/Icons/logo-porrua.jpg" alt="" >
                                    </td>
                                    <td id="Porrua">
                                        <?php 
                                                $cadena = evaluar($Porrua);
                                                implode(", ", $cadena);
                                        ?>
                                        <a href="<?php echo $Porrua ?>" class="btn  btn-lg btn-primary"  tabindex="-1" role="button" aria-disabled="true" style="background-color: <?php echo $cadena[1];?>" > <?php echo  $cadena[0]; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="iconoAmazon">
                                        <img src="/Icons/logo-amazon.png" alt="" >
                                    </td>
                                    
                                    <td id="Amazon">
                                        <?php 
                                            $cadena = evaluar($Amazon);
                                            implode(", ", $cadena);
                                        ?>
                                        <a href="<?php echo $Amazon ?>" class="btn  btn-lg btn-primary"  tabindex="-1" role="button" aria-disabled="true" style="background-color: <?php echo $cadena[1];?>" > <?php echo  $cadena[0]; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="iconoCarlosFuentes">
                                        <img src="/Icons/logo-carlos-fuentes.png" alt="" >
                                    </td>
                                    
                                    <td id="CarlosFuentes">
                                        <?php 
                                                $cadena = evaluar($CarlosFuentes);
                                                implode(", ", $cadena);
                                        ?>
                                        <a href="<?php echo $CarlosFuentes ?>" tanget="_blank" class="btn  btn-lg btn-primary"  tabindex="-1"  aria-disabled="true" style="background-color: <?php echo $cadena[1];?>" > <?php echo  $cadena[0]; ?></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>
        <div id="infoLibro">
            
            <p id="textoPDF"><?php echo $AuxTexto ?></p>
          
            <div class="audio" id="audio">
                    <p> Narrativa del libro.... </p>
                    <audio controls>
                        <source src="<?php echo $Audio ?>" type="audio/mpeg">
                        <source src="<?php echo $Audio ?>" type="audio/wav">
                        Tu navegador no es compatible con el audio...
                    </audio>
            </div>
        </div>    
        <div id="asideDer">
            <div id="borderTabla">
                <table class="table table-borderless" id="tablaDetalles" >
                    <tbody>
                        <tr>
                            <td id="iconoAutor">
                                <img src="/Icons/autor.svg" alt = "... ">
                            </td>
                            <td>Autor</td>
                            <td id="nombreAutor"><?php echo  $Autor?></td>
                        </tr>
                        <tr>
                            <td id="iconoISBN">
                                <img src="/Icons/isbn.svg" alt="" >
                            </td>
                            <td>ISBN</td>
                            <td id="numISBN"><?php echo  $ISBN ?></td>
                        </tr>
                        <tr>
                            <td id="iconoColeccion">
                                <img src="/Icons/coleccion.svg" alt="" >
                            </td>
                            <td>Colección</td>
                            <td id="tipoColeccion"><?php echo $Coleccion?></td>
                        </tr>
                        <tr>
                            <td id="iconoNumEd">
                                <img src="/Icons/noedicion.svg" alt="" >
                            </td>
                            <td>NúmeroDeEdición</td>
                            <td id="numEdicion"><?php  echo $Edicion ?></td>
                        </tr>
                        <tr>
                            <td id="iconoPags">
                                <img src="/Icons/paginas.svg" alt="" >
                            </td>
                            <td>Páginas</td>
                            <td id="numPags"><?php echo $Paginas ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   

    <script src="/JS/animaciones.js" type="text/javascript"></script>
    <script src="/JS/funciones.js"></script>          
    <script src="/JS/jquery-3.4.1.min.js"></script>
    <?php require_once("../common/footer.php"); ?>

</body>
</html>






