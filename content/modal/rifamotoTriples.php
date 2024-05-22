
<!-- Modal -->
<div class="modal fade" id="rifaMotoTrtiples" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">RIFA DE MOTO TRIPLES</h3>
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
              <label for="cedulaTripleMoto" class="col-form-label">Cedula</label>
              <input type="text" class="form-control" id="cedulaTripleMoto" name="cedulaTripleMoto" pattern="[0-9]{8}">
          </div>
          <br>
          <!-- <hr> -->
          <h5 class="modal-title fs-7">Eleccion del numero</h5>
            <div class="form-group">
                <label for="numeroMotoTriple1" class="col-form-label">Numero Uno</label>
                <input type="text" class="form-control" id="numeroMotoTriple1" name="numeroMotoTriple1" pattern="[0-9]{3,3}" maxlength="3">
                <span></span>
            </div>
            <div class="form-group">
                <label for="estado" class="col-form-label">Signo del Zodiaco</label>
                <select name="zodiaco1" id="zodiaco1" class="form-control form-control-lg">
                <?php foreach ($resultadoZodiaco as $row) : ?>
                <option value="<?php echo $row['zodiaco']; ?>"><?php echo $row['zodiaco']; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="numeroMotoTriple2" class="col-form-label">Numero Dos</label>
                <input type="text" class="form-control" id="numeroMotoTriple2" name="numeroMotoTriple2" pattern="[0-9]{3,3}" maxlength="3">
                <span></span>
            </div>
            <div class="form-group">
                <label for="estado" class="col-form-label">Signo del Zodiaco</label>
                <select name="zodiaco2" id="zodiaco2" class="form-control form-control-lg">
                <?php foreach ($resultadoZodiaco as $row) : ?>
                <option value="<?php echo $row['zodiaco']; ?>"><?php echo $row['zodiaco']; ?></option>
                <?php endforeach; ?>
                </select>
            </div>

          <input type="hidden" name="vendedorTripleMoto" id="vendedorTripleMoto" value="<?php echo $cedula;?>">
          <input type="hidden" name="fechaTripleMoto" id="fechaTripleMoto" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
          <input type="hidden" name="tipo_de_rifa_moto_triple" id="tipo_de_rifa_moto_triple" value="5">
        </form>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="RegistroNumerosTripleMoto()" value="Guardar">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
    
  </div>
</div>