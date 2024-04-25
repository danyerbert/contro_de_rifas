<!-- Modal -->
<div class="modal fade" id="BloquearNumeroTriple" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Bloquear Numero de Rifa Triple 500</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="bloqueoNumeroTriple">
        <div class="form-group">
              <label for="numeroBloquearTriple">Numero a bloquear</label>
              <input type="text" class="form-control" id="numeroBloquearTriple" name="numeroBloquearTriple" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <input type="hidden" name="tipo_de_rifasTriple" id="tipo_de_rifasTriple" value="4">
        </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="bloqueoNumeroTriple()" value="Bloquear">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>