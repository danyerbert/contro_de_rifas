<div class="modal fade" id="rifaDobleOportunidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">RIFA DOBLE OPORTUNIDAD</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		    </button>
    </div>
    <div class="modal-body">
    <h5 class="modal-title fs-7">Datos del Comprador</h5>
    <div class="form-group">
        <label for="cedula" class="col-form-label">Cedula</label>
        <input type="text" class="form-control" id="cedulaDoble" name="cedulaDoble" pattern="[0-9]{8}">
    </div>
          <div class="form-group">
              <label for="nombreApellido" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" id="nombreApellidoDoble" name="nombreApellidoDoble" pattern="[a-zA-Z\s]{4,20}">
          </div>
          <br>
          <!-- <hr> -->
          <h5 class="modal-title fs-7">Eleccion del numero</h5>
          <div class="form-group">
              <label for="nombre_bene" class="col-form-label">Numero</label>
              <input type="text" class="form-control" id="numeroDoble" name="numeroDoble" pattern="[0-9]{2,2}" maxlength="3">
              <span></span>
          </div>
          <input type="hidden" name="cedulaVendedor" id="cedulaVendedorDoble" value="<?php echo $cedula?>">
          <input type="hidden" name="fechaDoble" id="fechaDoble" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
          <input type="hidden" name="tipo_de_rifa_doble" id="tipo_de_rifa_doble" value="2">
    </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="RegistroDeDobleOportunidad()" value="Guardar">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>