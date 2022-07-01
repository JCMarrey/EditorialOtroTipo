<div class="modal fade"  data-bs-backdrop="static" id="ModalAddUsuario" tabindex="-1" aria-labelledby="ModalAddUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddUsuarioLabel">Agrega un Usuario nuevo.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyAddU.php" method="POST" enctype = "multipart/form-data">
            
            <label for="addL-Form-Nombre" class="col-form-label">Nombre:</label>
            <input  type="text" name = "NOMBRE" class="form-control" id="addL-Form-Nombre">
            <label for="addL-Form-Correo" class="col-form-label">Correo:</label>
            <input  type="text" name = "CORREO" class="form-control" id="addL-Form-Correo">
            <label for="addL-Form-Pass" class="col-form-label">Contraseña:</label>
            <input  type="text" name = "PASS" class="form-control" id="addL-Form-Pass">
         
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input id="btn-modal-add-Usuario" type="submit" class="btn btn-success">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>