<div class="modal fade"  data-bs-backdrop="static" id="ModalEditMedia" tabindex="-1" aria-labelledby="ModalEditMediaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditMediaLabel">Realiza los cambios que requieras.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyEditM.php" method="POST" id="formMedia" enctype = "multipart/form-data">

            <input  type="text" hidden name = "IdArchivo" class="form-control" id="editM-Form-idArchivo">
            <input  type="text" hidden name = "nameArchivo" class="form-control" id="editM-Form-nameArchivo">
            <input  type="text" hidden name = "tipoArchivo" class="form-control" id="editM-Form-tipoArchivo">

            <label for="editM-Form-Archivo" class="col-form-label">Tipo:</label>
            <input  type="text" disabled name ="ARCHIVOTIPO" class="form-control" id="editM-Form-Tipo" accept="image/*">
            
            <label for="editM-Form-Archivo" class="col-form-label">Archivo:</label>
            <input  type="file" name="ARCHIVO" class="form-control" id="editM-Form-Archivo" accept="image/*">
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input id="btn-modal-edit-Archivo" type="submit" class="btn btn-success">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<br>