<!-- Modal -->
<div class="modal fade" id="AcumuladoTriple" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Acomulado Rifa Triple 500</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="registroNumeroAcumuladoTriple">
                    <h5 class="modal-title fs-7">Eleccion del numero</h5>
                    <div class="form-group">
                        <label for="cedulaAcumulado" class="col-form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedulaAcumulado" name="cedulaAcumulado"
                            pattern="[0-9]{8}">
                    </div>
                    <div class="form-group">
                        <label for="numeroAcumuladoTriple" class="col-form-label">Numero</label>
                        <input type="text" class="form-control" id="numeroAcumuladoTriple" name="numeroAcumuladoTriple"
                            pattern="[0-9]{4,4}" maxlength="4">
                    </div>
                    <input type="hidden" name="vendedorTriple" id="vendedorTripleAcumulado"
                        value="<?php echo $cedula;?>">
                    <input type="hidden" name="fechaTriple" id="fechaTripleAcumulado" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
                    <input type="hidden" name="ParticipaAcumulado" id="ParticipaAcumulado" value="Si">
                    <input type="hidden" name="identificador" id="identificador"
                        value="<?php echo $rowNumero['irtq'];?>">
                    <input type="hidden" name="numeroTriple" id="numeroTriple"
                        value="<?php echo $rowNumero['numero'];?>">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" onclick="registroAcomulado()" value="Guardar">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>