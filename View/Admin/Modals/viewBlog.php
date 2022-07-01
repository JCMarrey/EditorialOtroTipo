<div class="modal fade"  data-bs-backdrop="static" id="ModalViewBlog" tabindex="-1" aria-labelledby="ModalViewBlogLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalViewBlogLabel">Agrega una entrada nueva al Blog.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyViewB.php" method="POST" id="formBlog" enctype = "multipart/form-data">
            
          
            <label for="viewB-Form-Blog" class="col-form-label">Titulo:</label>
            <input  type="text" disabled name="TITULO"  class="form-control" id="viewB-Form-Blog-Titulo" >

            <label for="viewB-Form-Blog" class="col-form-label">Autor:</label>
            <input  type="text" disabled name="AUTOR"  class="form-control" id="viewB-Form-Blog-Autor" >

            <label for="viewB-Form-Blog" class="col-form-label">Fecha:</label>
            <input  type="text" disabled name="FECHA" placeholder="DD/MM/AAAA" class="form-control" id="viewB-Form-Blog-Fecha" >

            <div class="flex-column">
                <label for="viewB-Form-Blog" class="col-form-label">Vista previa del Blog:</label>
                <textarea disabled rows = "6"  cols = "40" name = "PREVIEW" id="viewB-Form-Blog-Preview"></textarea>     
                <?php
                    $txt_file = fopen('/EditorialOtroTipo/Entradas/preview/','r');
                    $a = 1;
                    while ($line = fgets($txt_file)) {
                    echo($a." ".$line)."<br>";
                    $a++;
                    }
                    fclose($txt_file);
                ?>
            </div>

            <div class="flex-column">
                <label for="viewB-Form-Blog" class="col-form-label">Texto Blog:</label>
                <textarea disabled rows = "15"  cols = "40" name = "ENTRADA" id="viewB-Form-Blog-Entrada"></textarea>     
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<br>