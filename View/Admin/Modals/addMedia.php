<div class="modal fade"  data-bs-backdrop="static" id="ModalAddMedia" tabindex="-1" aria-labelledby="ModalAddMediaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddMediaLabel">Agrega un elemento a la sección que requieras.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyAddM.php" method="POST" id="formMedia" enctype = "multipart/form-data">
            
          <div class="aux">
            <label for="tipoM" class="col-form-label">Tipo:</label>
            <select id="tipoM" name="TIPOS" form="formMedia">
              <option selected disabled>--Selecciona una opción--</option>
              <option value="CARRUSEL">CARRUSEL PRINCIPAL</option>
              <option value="SEMBLANZA">SEMBLANZA</option>
            </select>
          </div>

            <label for="addM-Form-Archivo" class="col-form-label">Archivo:</label>
            <input  type="file" name="ARCHIVO" class="form-control" id="addM-Form-Archivo" accept="image/*">
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input id="btn-modal-add-Libro" type="submit" class="btn btn-success">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<br>