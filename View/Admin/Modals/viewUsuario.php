<div class="modal fade"  data-bs-backdrop="static" id="ModalViewUsuario" tabindex="-1" aria-labelledby="ModalViewUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalViewUsuarioLabel">Detalles del usuario.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyviewU.php" method="POST" enctype = "multipart/form-data">
            
            <label for="viewU-Form-Nombre" class="col-form-label">Nombre:</label>
            <input  type="text" disabled name = "NOMBRE" class="form-control" id="viewU-Form-Nombre">
            <label for="viewU-Form-Correo" class="col-form-label">Correo:</label>
            <input  type="text" disabled name = "CORREO" class="form-control" id="viewU-Form-Correo">
            <label for="viewU-Form-Pass" class="col-form-label">Contraseña:</label>
            <input  type="text" disabled name = "PASS" class="form-control" id="viewU-Form-Pass">
            <label for="viewU-Form-Rol" class="col-form-label">Rol:</label>
            <input  type="text" disabled name = "ROL" class="form-control" id="viewU-Form-Rol">
         
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>