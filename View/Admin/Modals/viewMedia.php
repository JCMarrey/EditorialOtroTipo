<div class="modal fade"  data-bs-backdrop="static" id="ModalViewMedia" tabindex="-1" aria-labelledby="ModalViewMediaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalViewMediaLabel">Detalles del archivo.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyViewM.php" method="POST" id="formMedia" enctype = "multipart/form-data">
            
          
            <label for="tipoM" class="col-form-label">Tipo:</label>
            <input  type="text" disabled class="form-control" id="viewM-Form-Tipo">
          

            <label for="viewM-Form-Archivo" class="col-form-label">Archivo:</label>
            <input  type="text" disabled  name="ARCHIVO" class="form-control" id="viewM-Form-Archivo">
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<br>