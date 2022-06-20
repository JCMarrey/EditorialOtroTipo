<div class="modal fade"  data-bs-backdrop="static" id="ModalEditLibro" tabindex="-1" aria-labelledby="ModalEditLibroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditLibroLabel">Editar el libro.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          
            <label for="editL-Form-Titulo" class="col-form-label">Titulo:</label>
            <input type="text" class="form-control" id="editL-Form-Titulo">
            <label for="editL-Form-Sinopsis" class="col-form-label">Sinopsis:</label>
            <input type="text" placeholder="Ruta" class="form-control" id="editL-Form-Sinopsis">
            <label for="editL-Form-Precio" class="col-form-label">Precio:</label>
            <input type="text" class="form-control" id="editL-Form-Precio">
            <label for="editL-Form-Autor" class="col-form-label">Autor:</label>
            <input type="text" class="form-control" id="editL-Form-Autor">
            <label for="editL-Form-ISBN" class="col-form-label">ISBN:</label>
            <input disabled type="text" class="form-control" id="editL-Form-ISBN">
            <label for="editL-Form-Tema" class="col-form-label">Tema:</label>
            <input type="text" class="form-control" id="editL-Form-Tema">
            <label for="editL-Form-Tipo" class="col-form-label">Tipo:</label>
            <input type="text" class="form-control" id="editL-Form-Tipo">
            <label for="editL-Form-Coleccion" class="col-form-label">Coleccion:</label>
            <input type="text" class="form-control" id="editL-Form-Coleccion">
            <label for="editL-Form-AEdicion" class="col-form-label">Año Edicion:</label>
            <input type="text" placeholder="Año de la edición." class="form-control" id="editL-Form-AEdicion">
            <label for="editL-Form-Edición" class="col-form-label">Edición:</label>
            <input type="text" class="form-control" id="editL-Form-Edicion">
            <label for="editL-Form-Páginas" class="col-form-label">Páginas:</label>
            <input type="text" class="form-control" id="editL-Form-Paginas">
            <label for="editL-Form-Peso" class="col-form-label">Peso:</label>
            <input type="text" class="form-control" id="editL-Form-Peso">
            <label for="editL-Form-Firma" class="col-form-label">Firma:</label>
            <input type="text" class="form-control" id="editL-Form-Firma">
            <label for="editL-Form-Imagen" class="col-form-label">Imagen:</label>
            <input type="text" class="form-control" id="editL-Form-Imagen">
            <label for="editL-Form-Capitulo1" class="col-form-label">Capitulo1:</label>
            <input type="text" class="form-control" id="editL-Form-Capitulo1">
            <label for="editL-Form-Costo" class="col-form-label">Costo:</label>
            <input type="text" class="form-control" id="editL-Form-Costo">
          

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btn-modal-edit-Libro" type="button" class="btn btn-success">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>