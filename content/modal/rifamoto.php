
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
              <label for="cedula" class="col-form-label">Cedula</label>
              <input type="text" class="form-control" id="cedula" name="cedula" pattern="[0-9]{8}">
          </div>
          <div class="form-group">
              <label for="nombreApellido" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" id="nombreApellido" name="nombreApellido" pattern="[a-zA-Z\s]{4,20}">
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
          <h5 class="modal-title fs-7">Selecciona el metodo de pago</h5>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline2" name="metodoDePagoMoto" class="custom-control-input" value = "1">
							<label class="custom-control-label" for="customRadioInline2" onclick = "javascript: var ch=document.getElementById('ReferenciaPagoMovilMoto');ch.style.display='inline' ; 
              var ch2=document.getElementById('cantidadBolivaresMoto');ch2.style.display='none' ;
              var ch3=document.getElementById('cantidadDivisasMoto');ch3.style.display='none' ;
              " >Pago Movil</label>
						</div>
          </div>
          <br>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline1" name="metodoDePagoMoto" value = "2" class="custom-control-input" onclick = "javascript: var ch=document.getElementById('ReferenciaPagoMovilMoto');ch.style.display='none';
                var ch2=document.getElementById('cantidadDivisasMoto');ch2.style.display='inline' ; 
                var ch3=document.getElementById('cantidadBolivaresMoto');ch3.style.display='none' ; 
              ">
							<label class="custom-control-label" for="customRadioInline1">Efectivo Divisas $</label>
						</div>
          </div>
          <br>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline3" name="metodoDePagoMoto" value = "3" class="custom-control-input" onclick = "javascript: var ch=document.getElementById('cantidadDivisasMoto');ch.style.display='none';
                var ch2=document.getElementById('cantidadBolivaresMoto');ch2.style.display='inline' ; 
              ">
							<label class="custom-control-label" for="customRadioInline3">Efectivo Bolivares</label>
						</div>
          </div>
          <div class="form-group" id="ReferenciaPagoMovilMoto" style="display:none">
              <label for="ReferenciaPagoMovilNA" class="col-form-label">Referencia</label>
              <input type="text" class="form-control" id="ReferenciaPagoMovilNA" name="ReferenciaPagoMovilNA" pattern="[0-9]" maxlength="20">
          </div>
          <div class="form-group" id="cantidadDivisasMoto" style="display:none">
              <label for="cantidadDivisasNA" class="col-form-label">Cantidad en Dolares</label>
              <input type="text" class="form-control" id="cantidadDivisasNA" name="cantidadDivisasNA" pattern="[0-9]" maxlength="20">
          </div>
          <div class="form-group" id="cantidadBolivaresMoto" style="display:none">
              <label for="cantidadBolivaresNA" class="col-form-label">Cantidad en Bolivares</label>
              <input type="text" class="form-control" id="cantidadBolivaresNA" name="cantidadBolivaresNA" pattern="[0-9]" maxlength="20">
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