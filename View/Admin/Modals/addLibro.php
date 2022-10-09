<div class="modal fade"  data-bs-backdrop="static" id="ModalAddLibro" tabindex="-1" aria-labelledby="ModalAddLibroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddLibroLabel">Agrega un libro nuevo al catálogo.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ProxyAddL.php" method="POST" enctype = "multipart/form-data">
            
            <label for="addL-Form-ISBN" class="col-form-label">ISBN:</label>
            <input  type="text" name = "ISBN" class="form-control" id="addL-Form-ISBN">
            <label for="addL-Form-Titulo" class="col-form-label">Titulo:</label>
            <input  type="text" name = "TITULO" class="form-control" id="addL-Form-Titulo">
            <label for="addL-Form-Autor" class="col-form-label">Autor:</label>
            <input  type="text" name = "AUTOR" class="form-control" id="addL-Form-Autor">
            <label for="addL-Form-Tema" class="col-form-label">Tema:</label>
            <input  type="text" name = "TEMA"  class="form-control" id="addL-Form-Tema">
            <label for="addL-Form-Tipo" class="col-form-label">Tipo:</label>
            <input  type="text" name = "TIPO" class="form-control" id="addL-Form-Tipo">
            <label for="addL-Form-Coleccion" class="col-form-label">Coleccion:</label>
            <input  type="text" name = "COLECCION" class="form-control" id="addL-Form-Coleccion">
            <label for="addL-Form-AEdicion" class="col-form-label">Año Edicion:</label>
            <input  type="text" name = "AEDICION" placeholder="Año de la edición." class="form-control" id="addL-Form-AEdicion">
            <label for="addL-Form-Edición" class="col-form-label">Edición:</label>
            <input  type="text" name = "EDICION" placeholder="Primera, Segunda, Tercera, etc..." class="form-control" id="addL-Form-Edicion">
            <label for="addL-Form-Páginas" class="col-form-label">Páginas:</label>
            <input  type="text" name = "PAGINAS" class="form-control" id="addL-Form-Paginas">
            <label for="addL-Form-Peso" class="col-form-label">Peso:</label>
            <input  type="text" name = "PESO" placeholder="En Kg" class="form-control" id="addL-Form-Peso">
            <label for="addL-Form-Precio" class="col-form-label">Precio:</label>
            <input  type="text" name = "PRECIO" class="form-control" id="addL-Form-Precio">
            <label for="addL-Form-Costo" class="col-form-label">Existencia:</label>
            <input  type="number" name = "CANTIDAD" value="1" min="1" class="form-control" id="addL-Form-Costo">
            <label for="addL-Form-Promocion" class="col-form-label">Porcentaje de descuento:</label>
            <input  type="number" name = "PROMOCION" min="0" max="100" value="0" class="form-control" id="addL-Form-Promocion">
            <label for="addL-Form-Sinopsis" class="col-form-label">Sinopsis:</label>
            <input  type="file" name="archSinopsis" class="form-control" id="addL-Form-Sinopsis" accept=".doc,.docx,.txt">
            <label for="addL-Form-Imagen" class="col-form-label">Imagen:</label>
            <input  type="file" name="archImagen" class="form-control" id="addL-Form-Imagen" accept="image/*">
            <label for="addL-Form-Capitulo1" class="col-form-label">Capitulo1:</label>
            <input  type="file" name="archCap1" class="form-control" id="addL-Form-Capitulo1" accept="application/pdf">
            <label for="addL-Form-Audio" class="col-form-label">Audio:</label>
            <input  type="file" name="archAudio" class="form-control" id="addL-Form-Audio" accept=".mp3,audio/*">

            <label style="margin-top: 1rem;" class="col-form-label">Selecciona cero o más opciones:</label>

            <div class="esp-form-field" style="margin-left: 1rem;">
              <input type="checkbox" value="FIRMADO" id="addL-Form-Firma" name="FIRMA">
              <label style="margin-left: 1.4rem;" for="firma">Firmado</label>
            </div>

            <div class="esp-form-field" style="justify-content: space-evenly;">
              <input type="checkbox" value="DISPONIBLE" id="addL-Form-Gandhi" name="Gandhi">
              <label for="Gandhi">Gandhi</label>
              <input type="checkbox" value="DISPONIBLE" id="addL-Form-Porrua" name="Porrua">
              <label for="Porrua">Porrua</label>
              <input type="checkbox" value="DISPONIBLE" id="addL-Form-CarlosFuentes" name="CarlosFuentes">
              <label for="CarlosFuentes">Carlos Fuentes</label>
              <input type="checkbox" value="DISPONIBLE" id="addL-Form-Sotano" name="Sotano">
              <label for="Sotano">Sotano</label>
              <input type="checkbox" value="DISPONIBLE" id="addL-Form-Amazon" name="Amazon">
              <label for="Amazon">Amazon</label>
            </div>

            <label style="margin-top: 1rem;" class="col-form-label">Agrega solo los URL necesarios:</label>
            <br>
            <br>

            <label for="addL-Form-U1" class="col-form-label">Url Gandhi:</label>
            <input  type="text" name="UGandhi" class="form-control" id="addL-Form-U1">
            <label for="addL-Form-U2" class="col-form-label">Url Porrua:</label>
            <input  type="text" name="UPorrua" class="form-control" id="addL-Form-U2">
            <label for="addL-Form-U3" class="col-form-label">Url Carlos Fuentes:</label>
            <input  type="text" name="UCarlosFuentes" class="form-control" id="addL-Form-U3">
            <label for="addL-Form-U4" class="col-form-label">Url Sotano:</label>
            <input  type="text" name="USotano" class="form-control" id="addL-Form-U4">
            <label for="addL-Form-U5" class="col-form-label">Url Amazon:</label>
            <input  type="text" name="UAmazon" class="form-control" id="addL-Form-U5">
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input id="btn-modal-add-Libro" type="submit" class="btn btn-success">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>