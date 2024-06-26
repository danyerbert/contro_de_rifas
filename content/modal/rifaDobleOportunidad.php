<div class="modal fade" id="rifaDobleOportunidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">RIFA ROYAL</h3>
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
          <h5 class="modal-title fs-7">Selecciona el metodo de pago</h5>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="mtRoyal1" name="metodoDePagoRoyal" class="custom-control-input" value = "1">
							<label class="custom-control-label" for="mtRoyal1" onclick = "javascript: var ch=document.getElementById('ReferenciaPagoMovilRoyal');ch.style.display='inline' ; 
              var ch2=document.getElementById('cantidadBolivaresRoyal');ch2.style.display='none' ;
              var ch3=document.getElementById('cantidadDivisasRoyal');ch3.style.display='none' ;
              " >Pago Movil</label>
						</div>
          </div>
          <br>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="mtRoyal2" name="metodoDePagoRoyal" value = "2" class="custom-control-input" onclick = "javascript: var ch=document.getElementById('ReferenciaPagoMovilRoyal');ch.style.display='none';
                var ch2=document.getElementById('cantidadDivisasRoyal');ch2.style.display='inline' ; 
                var ch3=document.getElementById('cantidadBolivaresRoyal');ch3.style.display='none' ; 
              ">
							<label class="custom-control-label" for="mtRoyal2">Efectivo Divisas $</label>
						</div>
          </div>
          <br>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="mtRoyal3" name="metodoDePagoRoyal" value = "3" class="custom-control-input" onclick = "javascript: var ch=document.getElementById('cantidadDivisasRoyal');ch.style.display='none';
                var ch2=document.getElementById('cantidadBolivaresRoyal');ch2.style.display='inline' ; 
              ">
							<label class="custom-control-label" for="mtRoyal3">Efectivo Bolivares</label>
						</div>
          </div>
          <div class="form-group" id="ReferenciaPagoMovilRoyal" style="display:none">
              <label for="ReferenciaPagoMovilRoyal" class="col-form-label">Referencia</label>
              <input type="text" class="form-control" id="ReferenciaPagoMovilRoyala" name="ReferenciaPagoMovilRoyala" pattern="[0-9]" maxlength="20">
          </div>
          <div class="form-group" id="cantidadDivisasRoyal" style="display:none">
              <label for="cantidadDivisasRoyal" class="col-form-label">Cantidad en Dolares</label>
              <input type="text" class="form-control" id="cantidadDivisasRoyala" name="cantidadDivisasRoyala" pattern="[0-9]" maxlength="20">
          </div>
          <div class="form-group" id="cantidadBolivaresRoyal" style="display:none">
              <label for="cantidadBolivaresROYAL" class="col-form-label">Cantidad en Bolivares</label>
              <input type="text" class="form-control" id="cantidadBolivaresROYALa" name="cantidadBolivaresROYALa" pattern="[0-9]" maxlength="20">
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
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>