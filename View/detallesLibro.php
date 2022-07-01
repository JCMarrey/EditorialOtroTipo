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
                <img class="imgDetallesLibro" src="/img/p1.jpg" alt="...">
            </div>
            <div id="nombreLibro" style="padding-bottom: 30px; padding-top: 30px;">
                Nombre del libro
            </div>
            <div>
                <div class="d-grid gap-3 d-md-block">
                    <ul style="background-color: #F4F3F4; border-radius:10px;">
                    <div id="detallesLibroPrecio">$precio</div> 
                    <div class="btn-group" role="group" aria-label="Basic outlined example"">
                        <button type="button" class="btn btn-outline-primary" id="aumentarC">-</button>
                        <input id="detallesLibroCantidad" type="number" min="1" pattern="^[0-9]+" value="1">
                        <button type="button" class="btn btn-outline-primary" id="disminuirC">+</button>
                    </div>
                    <a  href="www.google.com" class="btnS1D"  type="button">
                            <i class="fas fa-shopping-cart icono-header"></i>
                            Añadir al carrito
                                
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div id="infoLibro">
            <p id="textoPDF">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur aperiam odio eveniet, rem consectetur quos voluptas perferendis! Iste, suscipit. Corporis asperiores voluptas atque deleniti, debitis reprehenderit necessitatibus aut iusto quae.</p>
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
                            <td id="nombreAutor">NombreAutor</td>
                        </tr>
                        <tr>
                            <td id="iconoISBN">
                                <img src="/Icons/isbn.svg" alt="" >
                            </td>
                            <td>ISBN</td>
                            <td id="numISBN">645554</td>
                        </tr>
                        <tr>
                            <td id="iconoColeccion">
                                <img src="/Icons/coleccion.svg" alt="" >
                            </td>
                            <td>Colección</td>
                            <td id="tipoColeccion">Poesía</td>
                        </tr>
                        <tr>
                            <td id="iconoNumEd">
                                <img src="/Icons/noedicion.svg" alt="" >
                            </td>
                            <td>NúmeroDeEdición</td>
                            <td id="numEdicion">Primera</td>
                        </tr>
                        <tr>
                            <td id="iconoPags">
                                <img src="/Icons/paginas.svg" alt="" >
                            </td>
                            <td>Páginas</td>
                            <td id="numPags">96</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   

</body>
</html>






