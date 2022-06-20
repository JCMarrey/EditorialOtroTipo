<?php

  require '../config/Database.php';

  $db = new Database();

  $con = $db->conectar();

  //seleccionamos todos los libros

  //$sql = $con->prepare("SELECT*FROM deotrotipo.libro");

  
//verificamos que lleva una categoría en el URL


  /*if(isset($_GET['idLibro'])){
      $idLibro = $_GET['idLibro'];
      $sql_detalleLibro= $con->prepare("SELECT*FROM deotrotipo.libro WHERE idLibro='$idLibro'");
      //SELECT*FROM deotrotipo.libro WHERE Coleccion = "Ficción De Otro Tipo";
      $sql_libros->execute();
      $result = $sql_libros->fetchAll(PDO::FETCH_ASSOC);
  }
*/
//si existe de manda el id, caso contrario se queda en el menú...
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
        $sql_detalleLibro= $con->prepare("SELECT Titulo, Precio, Imagen, Sinopsis, Autor, ISBN, Coleccion, Edicion, Paginas FROM deotrotipo.libro WHERE idLibro=? ");
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


        $AuxTexto = "";
        $contents=file_get_contents($Sinopsis);
        $lines=explode("\n",$contents);
        foreach($lines as $line){
         $AuxTexto = $AuxTexto . $line;
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

    <title>Editorial Otro Tipo</title>
</head>


<body>
   <?php require_once("../common/header.php"); ?>
   <div class="detallesLibro">
        <div id="asideIzq">
            <div>
                <img class="imgDetallesLibro" src="<?php echo $Imagen ?>" alt="...">
            </div>
            <div id="nombreLibro" style="padding-bottom: 30px; padding-top: 30px;">
                <?php echo $Titulo ?>
            </div>
            <div>
                <div class="d-grid gap-3 d-md-block">
                    <ul style="background-color: #F4F3F4; border-radius:10px;">
                    <div id="detallesLibroPrecio">$<?php  echo $Precio?></div> 
                    <div class="btn-group" role="group" aria-label="Basic outlined example"">
                        <button type="button" class="btn btn-outline-primary" id="aumentarC">-</button>
                        <input id="detallesLibroCantidad" type="number" min="1" pattern="^[0-9]+" value="1">
                        <button type="button" class="btn btn-outline-primary" id="disminuirC">+</button>
                    </div>

                    <!--<div class="d-grid gap-3 d-md-block">
                        <button class="btnS1D agregar-producto-c" type="button" onclick="Mostrar()">Comprar</button>
                        <ul class="fas fa-shopping-cart icono-header" id="idProducto" style="display:none";>
                          <li><?php echo $row['idLibro'] ?><li>
                        </ul>
                        <p class="idProducto" style="display:none"; id="producto-id">1</p>
                    </div>-->

                    <a  class="btnS1D"  type="button" onclick="Mostrar()">
                            <i class="fas fa-shopping-cart icono-header"></i>
                            Añadir al carrito             
                    </a>
                    </ul>
                </div>
            </div>
        </div>
        <div id="infoLibro">
            <p id="textoPDF"><?php echo $AuxTexto ?></p>
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






