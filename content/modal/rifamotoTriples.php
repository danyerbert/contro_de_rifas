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
                        <label for="cedulaTripleMoto" class="col-form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedulaTripleMoto" name="cedulaTripleMoto"
                            pattern="[0-9]{8}" maxlength="8">
                    </div>
                    <div class="form-group">
                        <label for="nombreTriple" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreTriple" name="nombreTriple"
                            pattern="[a-zA-Z\s]{4,20}" maxlength="20">
                    </div>
                    <br>
                    <!-- <hr> -->
                    <h5 class="modal-title fs-7">Eleccion los triples</h5>
                    <div class="form-group">
                        <label for="numeroMotoTriple1" class="col-form-label">Primer Triple</label>
                        <input type="text" class="form-control" id="numeroMotoTriple1" name="numeroMotoTriple1"
                            pattern="[0-9]{3,3}" maxlength="3">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="estado" class="col-form-label">Primer Signo del Zodiaco</label>
                        <select name="zodiaco1" id="zodiaco1" class="form-control form-control-lg">
                            <?php foreach ($resultadoZodiaco as $row) : ?>
                            <option value="<?php echo $row['zodiaco']; ?>"><?php echo $row['zodiaco']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numeroMotoTriple2" class="col-form-label">Segundo Triple</label>
                        <input type="text" class="form-control" id="numeroMotoTriple2" name="numeroMotoTriple2"
                            pattern="[0-9]{3,3}" maxlength="3">
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
                    <h5 class="modal-title fs-7">Selecciona el metodo de pago</h5>
                    <div class="form-control">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="mtTripleMoto1" name="metodoDePago" class="custom-control-input"
                                value="1">
                            <label class="custom-control-label" for="mtTripleMoto1" onclick="javascript: var ch=document.getElementById('ReferenciaPagoMovil');ch.style.display='inline' ; 
              var ch2=document.getElementById('cantidadBolivares');ch2.style.display='none' ;
              var ch3=document.getElementById('cantidadDivisas');ch3.style.display='none' ;
              ">Pago Movil</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-control">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="mtTripleMoto2" name="metodoDePago" value="2"
                                class="custom-control-input" onclick="javascript: var ch=document.getElementById('ReferenciaPagoMovil');ch.style.display='none';
                var ch2=document.getElementById('cantidadDivisas');ch2.style.display='inline' ; 
                var ch3=document.getElementById('cantidadBolivares');ch3.style.display='none' ; 
              ">
                            <label class="custom-control-label" for="mtTripleMoto2">Efectivo Divisas $</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-control">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="mtTripleMoto3" name="metodoDePago" value="3"
                                class="custom-control-input" onclick="javascript: var ch=document.getElementById('cantidadDivisas');ch.style.display='none';
                var ch2=document.getElementById('cantidadBolivares');ch2.style.display='inline'
                var ch3=document.getElementById('ReferenciaPagoMovil');ch3.style.display='none' ; 
              ">
                            <label class="custom-control-label" for="mtTripleMoto3">Efectivo Bolivares</label>
                        </div>
                    </div>
                    <div class="form-group" id="ReferenciaPagoMovil" style="display:none">
                        <label for="ReferenciaPagoMovilN" class="col-form-label">Referencia</label>
                        <input type="text" class="form-control" id="ReferenciaPagoMovilN" name="ReferenciaPagoMovilN"
                            pattern="[0-9]" maxlength="20">
                        <label for="montoBolivaresN">Monto en bolivares</label>
                        <input type="text" class="form-control" name="montoBolivaresN" id="montoBolivaresN">
                    </div>
                    <div class="form-group" id="cantidadDivisas" style="display:none">
                        <label for="cantidadDivisasN" class="col-form-label">Cantidad en Dolares</label>
                        <input type="text" class="form-control" id="cantidadDivisasN" name="cantidadDivisasN"
                            pattern="[0-9]" maxlength="20">
                    </div>
                    <div class="form-group" id="cantidadBolivares" style="display:none">
                        <label for="cantidadBolivaresN" class="col-form-label">Cantidad en Bolivares</label>
                        <input type="text" class="form-control" id="cantidadBolivaresN" name="cantidadBolivaresN"
                            pattern="[0-9]" maxlength="20">
                    </div>
                    <input type="hidden" name="vendedorTripleMoto" id="vendedorTripleMoto"
                        value="<?php echo $cedula;?>">
                    <input type="hidden" name="fechaTripleMoto" id="fechaTripleMoto" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
                    <input type="hidden" name="tipo_de_rifa_moto_triple" id="tipo_de_rifa_moto_triple" value="5">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" onclick="RegistroNumerosTripleMoto()" value="Guardar">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>