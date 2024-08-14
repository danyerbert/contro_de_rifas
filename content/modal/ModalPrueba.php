<!-- Modal -->
<div class="modal fade" id="ModalPrueba" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h5 class="modal-title fs-7">Datos del Comprador</h5>
                    <div class="form-group">
                        <label for="cedulaTriple" class="col-form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedulaTriple" name="cedulaTriple"
                            pattern="[0-9]{8}">
                    </div>
                    <div class="form-group">
                        <label for="nombreApellidoTriple" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreApellidoTriple" name="nombreApellidoTriple"
                            pattern="[a-zA-Z\s]{4,20}">
                    </div>
                    <br>
                    <h5 class="modal-title fs-7">Elección de numero</h5>
                    <?php 
                        for ($i=0; $i <= 3 ; $i++) { ?>
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <label class="sr-only" for="numeroTriple">Name</label>
                            <input type="text" class="form-control" id="numeroTriple" name="numeroTriple[]"
                                placeholder="numero">
                        </div>
                        <div class="col-sm-3 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="text" class="form-control" id="cantidad_apuesta" name="cantidad_apuesta"
                                    placeholder="Cantidad">
                            </div>
                        </div>
                        <div class="col-auto my-1">
                            <div class="form-check">
                                <label class="mr-sm-4 sr-only" for="loteria[]">Loteria</label>
                                <select class="custom-select mr-sm-2" id="loteria[]">
                                    <option selected value="0">Loteria...</option>
                                    <option value="Triple Tachira A">Triple Tachira A</option>
                                    <option value="Tiple Gana">Tiple Gana</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <?php
                            }
                        ?>
                    <br>
                    <h5 class="modal-title fs-7">Selecciona el metodo de pago</h5>
                    <br>
                    <div class="form-control">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="mtTriple5001" name="metodoDePagoTriple" class="custom-control-input"
                                value="1">
                            <label class="custom-control-label" for="mtTriple5001" onclick="javascript: var ch=document.getElementById('ReferenciaPagoMovilTriple500');ch.style.display='inline' ; 
              var ch2=document.getElementById('cantidadBolivaresTriple500');ch2.style.display='none' ;
              var ch3=document.getElementById('cantidadDivisasTriple500');ch3.style.display='none' ;
              ">Pago Movil</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-control">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="mtTriple5002" name="metodoDePagoTriple" value="2"
                                class="custom-control-input" onclick="javascript: var ch=document.getElementById('ReferenciaPagoMovilTriple500');ch.style.display='none';
                var ch2=document.getElementById('cantidadDivisasTriple500');ch2.style.display='inline' ; 
                var ch3=document.getElementById('cantidadBolivaresTriple500');ch3.style.display='none' ; 
              ">
                            <label class="custom-control-label" for="mtTriple5002">Efectivo Divisas $</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-control">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="mtTriple5003" name="metodoDePagoTriple" value="3"
                                class="custom-control-input" onclick="javascript: var ch=document.getElementById('cantidadDivisasTriple500');ch.style.display='none';
                var ch2=document.getElementById('cantidadBolivaresTriple500');ch2.style.display='inline'
                var ch3=document.getElementById('ReferenciaPagoMovilTriple500');ch3.style.display='none' ; 
              ">
                            <label class="custom-control-label" for="mtTriple5003">Efectivo Bolivares</label>
                        </div>
                    </div>
                    <div class="form-group" id="ReferenciaPagoMovilTriple500" style="display:none">
                        <label for="ReferenciaPagoMovilTri" class="col-form-label">Referencia</label>
                        <input type="text" class="form-control" id="ReferenciaPagoMovilTri"
                            name="ReferenciaPagoMovilTri" pattern="[0-9]" maxlength="20">
                        <label for="montoBolivaresTri">Monto en bolivares</label>
                        <input type="text" class="form-control" name="montoBolivaresTri" id="montoBolivaresTri">
                    </div>
                    <div class="form-group" id="cantidadDivisasTriple500" style="display:none">
                        <label for="cantidadDivisasTri" class="col-form-label">Cantidad en Dolares</label>
                        <input type="text" class="form-control" id="cantidadDivisasTri" name="cantidadDivisasTri"
                            pattern="[0-9]" maxlength="20">
                    </div>
                    <div class="form-group" id="cantidadBolivaresTriple500" style="display:none">
                        <label for="cantidadBolivaresTri" class="col-form-label">Cantidad en Bolivares</label>
                        <input type="text" class="form-control" id="cantidadBolivaresTri" name="cantidadBolivaresTri"
                            pattern="[0-9]" maxlength="20">
                    </div>

                    <input type="hidden" name="vendedorTriple" id="vendedorTriple" value="<?php echo $cedula;?>">
                    <input type="hidden" name="fechaTriple" id="fechaTriple" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
                    <input type="hidden" name="tipo_de_rifa_triple" id="tipo_de_rifa_triple" value="4">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Guardar">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>