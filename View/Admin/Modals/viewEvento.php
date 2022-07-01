<div class="modal fade"  data-bs-backdrop="static" id="ModalViewEvento" tabindex="-1" aria-labelledby="ModalViewEventoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalViewEventoLabel">Agrega un Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  id="formEvento" enctype = "multipart/form-data">
            
          
            <label for="viewE-Form-Evento" class="col-form-label">Fecha:</label>
            <input  type="text" disabled name="FECHA" placeholder="DD/MM/AAAA" class="form-control" id="viewE-Form-Evento-Fecha" accept="image/*">

            <div class="flex-column">
                <label for="viewE-Form-Evento" class="col-form-label">Descripción del evento:</label>
                <textarea rows = "6" disabled placeholder="Información del evento..." cols = "40" name = "INFO" id="viewE-Form-Evento-INFO"></textarea>     
            </div>

            <label for="viewE-Form-Evento" class="col-form-label">Banner:</label>
            <input  type="text" disabled name="BANNER" class="form-control" id="viewE-Form-Evento-Banner" accept="image/*">
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<br>