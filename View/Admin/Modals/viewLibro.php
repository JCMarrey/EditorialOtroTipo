<div class="modal fade"  id="ModalViewLibro" tabindex="-1" aria-labelledby="ModalViewLibroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalViewLibroLabel">Detalles del libro.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Proxy.php" method="POST" enctype = "multipart/form-data">
            
            <label for="viewL-Form-ISBN" class="col-form-label">ISBN:</label>
            <input  type="text" disabled name = "ISBN" class="form-control" id="viewL-Form-ISBN">
            <label for="viewL-Form-Titulo" class="col-form-label">Titulo:</label>
            <input  type="text" disabled name = "TITULO" class="form-control" id="viewL-Form-Titulo">
            <label for="viewL-Form-Autor" class="col-form-label">Autor:</label>
            <input  type="text" disabled name = "AUTOR" class="form-control" id="viewL-Form-Autor">
            <label for="viewL-Form-Tema" class="col-form-label">Tema:</label>
            <input  type="text" disabled name = "TEMA"  class="form-control" id="viewL-Form-Tema">
            <label for="viewL-Form-Tipo" class="col-form-label">Tipo:</label>
            <input  type="text" disabled name = "TIPO" class="form-control" id="viewL-Form-Tipo">
            <label for="viewL-Form-Coleccion" class="col-form-label">Coleccion:</label>
            <input  type="text" disabled name = "COLECCION" class="form-control" id="viewL-Form-Coleccion">
            <label for="viewL-Form-AEdicion" class="col-form-label">Año Edicion:</label>
            <input  type="text" disabled name = "AEDICION" placeholder="Año de la edición." class="form-control" id="viewL-Form-AEdicion">
            <label for="viewL-Form-Edición" class="col-form-label">Edición:</label>
            <input  type="text" disabled name = "EDICION" placeholder="Primera, Segunda, Tercera, etc..." class="form-control" id="viewL-Form-Edicion">
            <label for="viewL-Form-Páginas" class="col-form-label">Páginas:</label>
            <input  type="text" disabled name = "PAGINAS" class="form-control" id="viewL-Form-Paginas">
            <label for="viewL-Form-Peso" class="col-form-label">Peso:</label>
            <input  type="text" disabled name = "PESO" class="form-control" id="viewL-Form-Peso">
            <label for="viewL-Form-Precio" class="col-form-label">Precio:</label>
            <input  type="text" disabled name = "PRECIO" class="form-control" id="viewL-Form-Precio">
            <label for="viewL-Form-Costo" class="col-form-label">Costo:</label>
            <input  type="text" disabled name = "COSTO" class="form-control" id="viewL-Form-Costo">

            <label for="viewL-Form-Sinopsis" class="col-form-label">Sinopsis:</label>
            <input  type="text" disabled name="archSinopsis" class="form-control" id="viewL-Form-Sinopsis" accept=".doc,.docx,.txt">
            <label for="viewL-Form-Imagen" class="col-form-label">Imagen:</label>
            <input  type="text" disabled name="archImagen" class="form-control" id="viewL-Form-Imagen" accept="image/*">
            <label for="viewL-Form-Capitulo1" class="col-form-label">Capitulo1:</label>
            <input  type="text" disabled name="archCap1" class="form-control" id="viewL-Form-Capitulo1" accept="application/pdf">
            <label for="viewL-Form-Audio" class="col-form-label">Audio:</label>
            <input  type="text" disabled name="archAudio" class="form-control" id="viewL-Form-Audio" accept=".mp3,audio/*">

            <label style="margin-top: 1rem;" class="col-form-label">Selecciona cero o más opciones:</label>

            <div class="esp-form-field" style="margin-left: 1rem;">
              <input disabled type="checkbox" value="FIRMADO" id="viewL-Form-Firma" name="FIRMA">
              <label style="margin-left: 1.4rem;" for="firma">Firmado</label>
            </div>

            <div class="esp-form-field" style="justify-content: space-evenly;">
              <input disabled type="checkbox" value="DISPONIBLE" id="viewL-Form-Gandhi" name="Gandhi">
              <label for="Gandhi">Gandhi</label>
              <input disabled  type="checkbox" value="DISPONIBLE" id="viewL-Form-Porrua" name="Porrua">
              <label for="Porrua">Porrua</label>
              <input disabled type="checkbox" value="DISPONIBLE" id="viewL-Form-CarlosFuentes" name="CarlosFuentes">
              <label for="CarlosFuentes">Carlos Fuentes</label>
              <input disabled type="checkbox" value="DISPONIBLE" id="viewL-Form-Sotano" name="Sotano">
              <label for="Sotano">Sotano</label>
              <input disabled type="checkbox" value="DISPONIBLE" id="viewL-Form-Amazon" name="Amazon">
              <label for="Amazon">Amazon</label>
            </div>

          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>