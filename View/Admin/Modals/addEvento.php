<div class="modal fade"  data-bs-backdrop="static" id="ModalAddEvento" tabindex="-1" aria-labelledby="ModalAddEventoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddEventoLabel">Agrega un Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyAddE.php" method="POST" id="formEvento" enctype = "multipart/form-data">
            
          
            <label for="addE-Form-Evento" class="col-form-label">Fecha:</label>
            <input  type="text" name="FECHA" placeholder="DD/MM/AAAA" class="form-control" id="addE-Form-Evento-Fecha" accept="image/*">

            <div class="flex-column">
                <label for="addE-Form-Evento" class="col-form-label">Descripción del evento:</label>
                <textarea rows = "6" placeholder="Información del evento..." cols = "40" name = "INFO"></textarea>     
            </div>

            <label for="addE-Form-Evento" class="col-form-label">Banner:</label>
            <input  type="file" name="BANNER" class="form-control" id="addE-Form-Evento-Banner" accept="image/*">
          
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