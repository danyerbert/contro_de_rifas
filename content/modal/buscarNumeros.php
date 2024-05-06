
<!-- Modal -->
<div class="modal fade" id="BuscarNumeros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Buscar Numeros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="listadebusqueda.php" id="crearUsuario" method="POST">
            <div class="form-group">
                <label for="tipo_de_rifa">Estado de Recepción Del Equipo</label>
                <select name="tipo_de_rifa" id="tipo_de_rifa" class="form-control form-control-lg">
                    <?php foreach ($resultadoRifas as $rowRifas) : ?>
                    <option value="<?php echo $rowRifas['id_rifas']; ?>"><?php echo $rowRifas['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_de_recepcion">Fecha de busqueda</label>
                <input type="date" class="form-control" id="fecha_de_recepcion" name="fecha_de_recepcion">
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Buscar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </form>
    </div>
    </div>
    
  </div>
</div>