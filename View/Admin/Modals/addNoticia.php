<div class="modal fade"  data-bs-backdrop="static" id="ModalAddNoticia" tabindex="-1" aria-labelledby="ModalAddNoticiaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddNoticiaLabel">Agrega un Noticia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyaddN.php" method="POST"  id="formNoticia" enctype = "multipart/form-data">
            
            <input  type="text" hidden name = "IdNoticia" class="form-control" id="addN-Form-idNoticia">
            <input  type="text" hidden name = "nameArchivo" class="form-control" id="addN-Form-nameArchivo-Viejo">
          

            <label for="addN-Form-Noticia" class="col-form-label">Titulo:</label>
            <input  type="text"  name="TITULO"  class="form-control" id="addN-Form-Noticia-Titulo">

            <label for="addN-Form-Noticia" class="col-form-label">Autor:</label>
            <input  type="text"  name="AUTOR"  class="form-control" id="addN-Form-Noticia-Autor">

            <label for="addN-Form-Noticia" class="col-form-label">Fecha:</label>
            <input  type="text"  name="FECHA" placeholder="DD/MM/AAAA" class="form-control" id="addN-Form-Noticia-Fecha" accept="image/*">

            <div class="flex-column">
                <label for="addN-Form-Noticia" class="col-form-label">Resumen de la Noticia:</label>
                <textarea rows = "6"  placeholder="Máximo 250 caracteres" cols = "40" name = "RESUMEN" id="addN-Form-Noticia-RESUMEN"></textarea>     
            </div>

            <label for="addN-Form-Noticia" class="col-form-label">Logo Portal:</label>
            <input  type="file" name="LOGO" class="form-control" id="addN-Form-Noticia-LOGO" accept="image/*">
          
            <label for="addN-Form-Noticia" class="col-form-label">Url:</label>
            <input  type="text"  name="URL" placeholder ="Ingresa el url de la noticia" class="form-control" id="addN-Form-Noticia-URL">

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
              <input id="btn-modal-edit-Noticia" type="submit" class="btn btn-success">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<br>