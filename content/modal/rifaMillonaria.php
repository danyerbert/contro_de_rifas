<div class="modal fade" id="rifaMillonaria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">RIFA MILLONARIA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
          <form id="rifamillonaria">
          <h5 class="modal-title fs-7">Datos del Comprador</h5>
          <div class="form-group">
              <label for="nombreMillonaria">Nombre</label>
              <input type="text" class="form-control" id="nombreMillonaria" name="nombreMillonaria" pattern="[a-zA-Z\s]{4,20}">
          </div>
          <div class="form-group">
              <label for="cedulaMillonaria">Cedula</label>
              <input type="text" class="form-control" id="cedulaMillonaria" name="cedulaMillonaria" pattern="[0-9]{8}">
          </div>
          <br>
          <!-- <hr> -->
          <h5 class="modal-title fs-7">Eleccion del numero</h5>  
          <div class="form-group">
              <label for="numeroMillonario1">Numero 1</label>
              <input type="text" class="form-control" id="numeroMillonario1" name="numeroMillonario1" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <div class="form-group">
              <label for="numeroMillonario2">Numero 2</label>
              <input type="text" class="form-control" id="numeroMillonario2" name="numeroMillonario2" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <div class="form-group">
              <label for="numeroMillonario3">Numero 3</label>
              <input type="text" class="form-control" id="numeroMillonario3" name="numeroMillonario3" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <div class="form-group">
              <label for="numeroMillonario4">Numero 4</label>
              <input type="text" class="form-control" id="numeroMillonario4" name="numeroMillonario4" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <div class="form-group">
              <label for="numeroMillonario5">Numero 5</label>
              <input type="text" class="form-control" id="numeroMillonario5" name="numeroMillonario5" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <br>
            
          <input type="hidden" name="vendedorMillonario" id="vendedorMillonario" value="<?php echo $cedula;?>">
          <input type="hidden" name="fechaMillonario" id="fechaMillonario" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
          <input type="hidden" name="tipo_de_rifa_moto" id="tipo_de_rifa_millonaria" value="3">
          </form>
    </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="RegistroNumeroMillonaria()" value="Guardar">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>