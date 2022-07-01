<div class="modal fade"  data-bs-backdrop="static" id="ModalAddBlog" tabindex="-1" aria-labelledby="ModalAddBlogLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddBlogLabel">Agrega una entrada nueva al Blog.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyAddB.php" method="POST" id="formBlog" enctype = "multipart/form-data">
            
          
            <label for="addB-Form-Blog" class="col-form-label">Titulo:</label>
            <input  type="text" name="TITULO"  class="form-control" id="addB-Form-Blog-Titulo" >

            <label for="addB-Form-Blog" class="col-form-label">Autor:</label>
            <input  type="text" name="AUTOR"  class="form-control" id="addB-Form-Blog-Autor" >

            <label for="addB-Form-Blog" class="col-form-label">Fecha:</label>
            <input  type="text" name="FECHA" placeholder="DD/MM/AAAA" class="form-control" id="addB-Form-Blog-Fecha" >

            <div class="flex-column">
                <label for="addB-Form-Blog" class="col-form-label">Vista previa del Blog:</label>
                <textarea rows = "6" placeholder="Texto breve..." cols = "40" name = "PREVIEW"></textarea>     
            </div>

            <div class="flex-column">
                <label for="addB-Form-Blog" class="col-form-label">Texto Blog:</label>
                <textarea rows = "15" placeholder="Contenido de la entrada del Blog..." cols = "40" name = "ENTRADA"></textarea>     
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input id="btn-modal-add-Blog" type="submit" class="btn btn-success">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<br>