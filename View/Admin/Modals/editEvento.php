<div class="modal fade"  data-bs-backdrop="static" id="ModalEditEvento" tabindex="-1" aria-labelledby="ModalEditEventoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditEventoLabel">Agrega un Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyEditE.php" method="POST"  id="formEvento" enctype = "multipart/form-data">
            
            <input  type="text" hidden name = "IdEvento" class="form-control" id="editE-Form-idEvento">
            <input  type="text" hidden name = "nameArchivo" class="form-control" id="editE-Form-nameArchivo-Viejo">
          
            <label for="editE-Form-Evento" class="col-form-label">Fecha:</label>
            <input  type="text"  name="FECHA" placeholder="DD/MM/AAAA" class="form-control" id="editE-Form-Evento-Fecha" accept="image/*">

            <div class="flex-column">
                <label for="editE-Form-Evento" class="col-form-label">Descripción del evento:</label>
                <textarea rows = "6"  placeholder="Información del evento..." cols = "40" name = "INFO" id="editE-Form-Evento-INFO"></textarea>     
            </div>

            <label for="editE-Form-Evento" class="col-form-label">Banner:</label>
            <input  type="file" name="BANNER" class="form-control" id="editE-Form-Evento-Banner" accept="image/*">
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
              <input id="btn-modal-edit-Evento" type="submit" class="btn btn-success">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<br>