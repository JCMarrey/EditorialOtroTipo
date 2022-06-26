<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


        <form action="test.php" method="POST" enctype = "multipart/form-data">
          

            <label for="addL-Form-Sinopsis" class="col-form-label">Sinopsis:</label>
            <input required type="file" name="archSinopsis" placeholder="Ruta" class="form-control" id="addL-Form-Sinopsis" accept="application/pdf">
       
          
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input id="btn-modal-add-Libro" type="submit" class="btn btn-success">Agregar</submit>
      </div>
        </form>





</body>
</html>