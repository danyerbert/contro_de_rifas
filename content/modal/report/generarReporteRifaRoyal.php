<!-- Modal -->
<div class="modal fade" id="generarReporteRoyal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Generación de Reporte Rifa Royal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="php/redireccionamientoRoyal.php" method="POST" id="generarRifaDeMoto">
                    <div class="form-group">
                        <label for="fechaDesde" class="col-form-label">Desde</label>
                        <input type="date" class="form-control" id="fechaDesde" name="fechaDesde">
                    </div>
                    <div class="form-group">
                        <label for="fechaHasta" class="col-form-label">Hasta</label>
                        <input type="date" class="form-control" id="fechaHasta" name="fechaHasta">
                    </div>
                    <div class="form-group">
                        <label for="estado" class="col-form-label">Seleccione el metodo de pago</label>
                        <select name="metodoPago" id="metodoPago" class="form-control form-control-lg">
                            <?php foreach ($resultadoMetodoPago as $rowMetodoPago) : ?>
                            <option value="<?php echo $rowMetodoPago['id_metodo_pago']; ?>">
                                <?php echo $rowMetodoPago['metodo']; ?>
                            </option>
                            <?php endforeach; ?>
                            <option value="4">Todos</option>
                        </select>
                    </div>
                    <h5 class="modal-title fs-7">Selecciona el metodo de pago</h5>
                    <br>
                    <div class="form-control">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="formato1" name="formato" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="formato1">PDF</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-control">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="formato2" name="formato" value="2" class="custom-control-input">
                            <label class="custom-control-label" for="formato2">EXCEL</label>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="rol" id="rol" value="<?php echo $rol;?>">
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Generar">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>