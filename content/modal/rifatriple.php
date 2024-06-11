
<!-- Modal -->
<div class="modal fade" id="rifaTriple" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">RIFA DE TRIPLE 500</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		    </button>
    </div>
    <div class="modal-body">
        <form id="registroNumeroTriple">
        <!-- <form id="registroNumeroTriple" action="php/registroTripleRifa2.php" method="POST"> -->
          <!-- <br> -->
          <h5 class="modal-title fs-7">Datos del Comprador</h5>
          <div class="form-group">
              <label for="cedulaTriple" class="col-form-label">Cedula</label>
              <input type="text" class="form-control" id="cedulaTriple" name="cedulaTriple" pattern="[0-9]{8}">
          </div>
          <div class="form-group">
              <label for="nombreApellidoTriple" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" id="nombreApellidoTriple" name="nombreApellidoTriple" pattern="[a-zA-Z\s]{4,20}">
          </div>
          <br>
          <!-- <hr> -->
          <h5 class="modal-title fs-7">Eleccion del numero</h5>
        <div class="form-group">
              <label for="numeroTriple" class="col-form-label">Numero</label>
              <input type="text" class="form-control" id="numeroTriple" name="numeroTriple" pattern="[0-9]{3,3}" maxlength="3">
              <span></span>
          </div>
          <div class="form-group">
              <label for="cantidadApuesta" class="col-form-label">Cantidad Apostada</label>
              <input type="text" class="form-control" id="cantidad_apuesta" name="cantidad_apuesta" pattern="[0-9]">
              <span></span>
          </div>
          <h5 class="modal-title fs-7">Seleccion de loteria:</h5>
          <br>
          <div class="form-control">
            <div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input loteria" id="loteriaOne" name="loteria" value="triple Tachira A">
							<label class="custom-control-label" for="loteriaOne">Triple Tachira A</label>
						</div>
          </div>
          <br>
          <div class="form-control">
            <div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input loteria" id="loteriaDos" name="loteria" value="triple gana">
							<label class="custom-control-label" for="loteriaDos">Triple Gana</label>
						</div>
          </div>

          <input type="hidden" name="vendedorTriple" id="vendedorTriple" value="<?php echo $cedula;?>">
          <input type="hidden" name="fechaTriple" id="fechaTriple" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
          <input type="hidden" name="tipo_de_rifa_triple" id="tipo_de_rifa_triple" value="4">
          <!-- <button type="submit" class="btn btn-primary">Enviar</button> -->
        </form>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="registroTriple2()" value="Guardar">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
    
  </div>
</div>