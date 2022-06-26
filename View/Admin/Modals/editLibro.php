<div class="modal fade"  data-bs-backdrop="static" id="ModalEditLibro" tabindex="-1" aria-labelledby="ModalEditLibroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditLibroLabel">Edita los valores que requieras.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyEditL.php" method="POST" enctype = "multipart/form-data">
            <input  type="text" hidden name = "IDLIBRO" class="form-control" id="editL-Form-idLibro">
            
            <label for="editL-Form-ISBN" class="col-form-label">ISBN:</label>
            <input  hidden type="text"  name = "ISBN" class="form-control" id="editL-Form-ISBN">
            <input  disabled type="text"  name = "ISBNF" class="form-control" id="editL-Form-ISBNF">
            <label for="editL-Form-Titulo" class="col-form-label">Titulo:</label>
            <input  type="text" name = "TITULO" class="form-control" id="editL-Form-Titulo">
            <label for="editL-Form-Autor" class="col-form-label">Autor:</label>
            <input  type="text" name = "AUTOR" class="form-control" id="editL-Form-Autor">
            <label for="editL-Form-Tema" class="col-form-label">Tema:</label>
            <input  type="text" name = "TEMA"  class="form-control" id="editL-Form-Tema">
            <label for="editL-Form-Tipo" class="col-form-label">Tipo:</label>
            <input  type="text" name = "TIPO" class="form-control" id="editL-Form-Tipo">
            <label for="editL-Form-Coleccion" class="col-form-label">Coleccion:</label>
            <input  type="text" name = "COLECCION" class="form-control" id="editL-Form-Coleccion">
            <label for="editL-Form-AEdicion" class="col-form-label">Año Edicion:</label>
            <input  type="text" name = "AEDICION" placeholder="Año de la edición." class="form-control" id="editL-Form-AEdicion">
            <label for="editL-Form-Edición" class="col-form-label">Edición:</label>
            <input  type="text" name = "EDICION" placeholder="Primera, Segunda, Tercera, etc..." class="form-control" id="editL-Form-Edicion">
            <label for="editL-Form-Páginas" class="col-form-label">Páginas:</label>
            <input  type="text" name = "PAGINAS" class="form-control" id="editL-Form-Paginas">
            <label for="editL-Form-Peso" class="col-form-label">Peso:</label>
            <input  type="text" name = "PESO" class="form-control" id="editL-Form-Peso">
            <label for="editL-Form-Precio" class="col-form-label">Precio:</label>
            <input  type="text" name = "PRECIO" class="form-control" id="editL-Form-Precio">
            <label for="editL-Form-Costo" class="col-form-label">Costo:</label>
            <input  type="text" name = "COSTO" class="form-control" id="editL-Form-Costo">

            <label for="editL-Form-Sinopsis" class="col-form-label">Sinopsis:</label>
            <input  type="file" name="archSinopsis" class="form-control" id="editL-Form-Sinopsis" accept=".doc,.docx,.txt">
            <label for="editL-Form-Imagen" class="col-form-label">Imagen:</label>
            <input  type="file" name="archImagen" class="form-control" id="editL-Form-Imagen" accept="image/*">
            <label for="editL-Form-Capitulo1" class="col-form-label">Capitulo1:</label>
            <input  type="file" name="archCap1" class="form-control" id="editL-Form-Capitulo1" accept="application/pdf">
            <label for="editL-Form-Audio" class="col-form-label">Audio:</label>
            <input  type="file" name="archAudio" class="form-control" id="editL-Form-Audio" accept=".mp3,audio/*">

            <label style="margin-top: 1rem;" class="col-form-label">Selecciona cero o más opciones:</label>

            <div class="esp-form-field" style="margin-left: 1rem;">
              <input type="checkbox" value="FIRMADO" id="editL-Form-Firma" name="FIRMA">
              <label style="margin-left: 1.4rem;" for="firma">Firmado</label>
            </div>

            <div class="esp-form-field" style="justify-content: space-evenly;">
              <input type="checkbox" value="DISPONIBLE" id="editL-Form-Gandhi" name="Gandhi">
              <label for="Gandhi">Gandhi</label>
              <input type="checkbox" value="DISPONIBLE" id="editL-Form-Porrua" name="Porrua">
              <label for="Porrua">Porrua</label>
              <input type="checkbox" value="DISPONIBLE" id="editL-Form-CarlosFuentes" name="CarlosFuentes">
              <label for="CarlosFuentes">Carlos Fuentes</label>
              <input type="checkbox" value="DISPONIBLE" id="editL-Form-Sotano" name="Sotano">
              <label for="Sotano">Sotano</label>
              <input type="checkbox" value="DISPONIBLE" id="editL-Form-Amazon" name="Amazon">
              <label for="Amazon">Amazon</label>
            </div>

          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input id="btn-modal-edit-Libro" type="submit" class="btn btn-success">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>