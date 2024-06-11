<div class="modal fade" id="rifaMillonaria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">RIFA MILLONARIA</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		    </button>
    </div>
    <div class="modal-body">
          <form id="rifamillonaria">
          <h5 class="modal-title fs-7">Datos del Comprador</h5>
          <div class="form-group">
              <label for="cedulaMillonaria" class="col-form-label">Cedula</label>
              <input type="text" class="form-control" id="cedulaMillonaria" name="cedulaMillonaria" pattern="[0-9]{8}">
          </div>
          <div class="form-group">
              <label for="nombreMillonaria" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" id="nombreMillonaria" name="nombreMillonaria" pattern="[a-zA-Z\s]{4,20}">
          </div>
          <br>
          <!-- <hr> -->
          <h5 class="modal-title fs-7">Eleccion del numero</h5>  
          <div class="form-group">
              <label for="numeroMillonario1" class="col-form-label">Numero 1</label>
              <input type="text" class="form-control" id="numeroMillonario1" name="numeroMillonario1" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <div class="form-group">
              <label for="numeroMillonario2" class="col-form-label">Numero 2</label>
              <input type="text" class="form-control" id="numeroMillonario2" name="numeroMillonario2" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <div class="form-group">
              <label for="numeroMillonario3" class="col-form-label">Numero 3</label>
              <input type="text" class="form-control" id="numeroMillonario3" name="numeroMillonario3" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <div class="form-group">
              <label for="numeroMillonario4" class="col-form-label">Numero 4</label>
              <input type="text" class="form-control" id="numeroMillonario4" name="numeroMillonario4" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <div class="form-group">
              <label for="numeroMillonario5" class="col-form-label">Numero 5</label>
              <input type="text" class="form-control" id="numeroMillonario5" name="numeroMillonario5" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <br>
          <h5 class="modal-title fs-7">Selecciona el metodo de pago</h5>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="mtMillonaria1" name="metodoDePagoMillo" class="custom-control-input" value = "1">
							<label class="custom-control-label" for="mtMillonaria1" onclick = "javascript: var ch=document.getElementById('ReferenciaPagoMovilMillonaria');ch.style.display='inline' ; 
              var ch2=document.getElementById('cantidadBolivaresMillonaria');ch2.style.display='none' ;
              var ch3=document.getElementById('cantidadDivisasMillonaria');ch3.style.display='none' ;
              " >Pago Movil</label>
						</div>
          </div>
          <br>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="mtMillonaria2" name="metodoDePagoMillo" value = "2" class="custom-control-input" onclick = "javascript: var ch=document.getElementById('ReferenciaPagoMovilMillonaria');ch.style.display='none';
                var ch2=document.getElementById('cantidadDivisasMillonaria');ch2.style.display='inline' ; 
                var ch3=document.getElementById('cantidadBolivaresMillonaria');ch3.style.display='none' ; 
              ">
							<label class="custom-control-label" for="mtMillonaria2">Efectivo Divisas $</label>
						</div>
          </div>
          <br>
          <div class="form-control">
            <div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="mtMillonaria3" name="metodoDePagoMillo" value = "3" class="custom-control-input" onclick = "javascript: var ch=document.getElementById('cantidadDivisasMillonaria');ch.style.display='none';
                var ch2=document.getElementById('cantidadBolivaresMillonaria');ch2.style.display='inline' ; 
              ">
							<label class="custom-control-label" for="mtMillonaria3">Efectivo Bolivares</label>
						</div>
          </div>
          <div class="form-group" id="ReferenciaPagoMovilMillonaria" style="display:none">
              <label for="ReferenciaPagoMovilMi" class="col-form-label">Referencia</label>
              <input type="text" class="form-control" id="ReferenciaPagoMovilMi" name="ReferenciaPagoMovilMi" pattern="[0-9]" maxlength="20">
          </div>
          <div class="form-group" id="cantidadDivisasMillonaria" style="display:none">
              <label for="cantidadDivisasMi" class="col-form-label">Cantidad en Dolares</label>
              <input type="text" class="form-control" id="cantidadDivisasMi" name="cantidadDivisasMi" pattern="[0-9]" maxlength="20">
          </div>
          <div class="form-group" id="cantidadBolivaresMillonaria" style="display:none">
              <label for="cantidadBolivaresMi" class="col-form-label">Cantidad en Bolivares</label>
              <input type="text" class="form-control" id="cantidadBolivaresMi" name="cantidadBolivaresMi" pattern="[0-9]" maxlength="20">
          </div>
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
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>