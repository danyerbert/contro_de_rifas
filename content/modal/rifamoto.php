
<!-- Modal -->
<div class="modal fade" id="rifaMoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">RIFA DE MOTO</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		    </button>
    </div>
    <div class="modal-body">
        <form action="" id="registroNumeroMoto">
          <!-- <br> -->
          <h5 class="modal-title fs-7">Datos del Comprador</h5>
          <div class="form-group">
              <label for="nombreApellido" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" id="nombreApellido" name="nombreApellido" pattern="[a-zA-Z\s]{4,20}">
          </div>
          <div class="form-group">
              <label for="cedula" class="col-form-label">Cedula</label>
              <input type="text" class="form-control" id="cedula" name="cedula" pattern="[0-9]{8}">
          </div>
          <br>
          <!-- <hr> -->
          <h5 class="modal-title fs-7">Eleccion del numero</h5>
        <div class="form-group">
              <label for="nombre_bene" class="col-form-label">Numero</label>
              <input type="text" class="form-control" id="numeroMoto" name="numeroMoto" pattern="[0-9]{2,2}" maxlength="2">
              <span></span>
          </div>
          <div class="form-group">
            <label for="estado" class="col-form-label">Signo del Zodiaco</label>
            <select name="zodiaco" id="zodiaco" class="form-control form-control-lg">
              <?php foreach ($resultadoZodiaco as $row) : ?>
              <option value="<?php echo $row['id_zodiaco']; ?>"><?php echo $row['zodiaco']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <input type="hidden" name="vendedor" id="vendedor" value="<?php echo $cedula;?>">
          <input type="hidden" name="fecha" id="fecha" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
          <input type="hidden" name="tipo_de_rifa_moto" id="tipo_de_rifa_moto" value="1">
        </form>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="RegistroNumeroMoto()" value="Guardar">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
    
  </div>
</div>