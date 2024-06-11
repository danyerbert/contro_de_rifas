<!-- Modal -->
<div class="modal fade" id="limitarVenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Limite de Venta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="limiteDeVenta">
                    <div class="form-group">
                        <label for="cantidadVenta" class="col-form-label">Limite de numero a vender</label>
                        <input type="text" class="form-control" id="cantidadVenta" name="cantidadVenta" pattern="[0-9]"
                            maxlength="1">
                    </div>
                    <div class="form-group">
                        <label for="rifaSeleccion" class="col-form-label">Selecciona la rifa:</label>
                        <select name="rifaSeleccion" id="rifaSeleccion" class="form-control form-control-lg">
                            <?php foreach ($resultadoRifas as $row) : ?>
                            <option value="<?php echo $row['id_rifas']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" onclick="limitarVenta()" value="Guardar">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>