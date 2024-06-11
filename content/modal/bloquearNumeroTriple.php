<!-- Modal -->
<div class="modal fade" id="BloquearNumeroTriple" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Bloquear Numero de Rifa Triple 500</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		    </button>
      </div>
      <div class="modal-body">
        <form id="bloqueoNumeroTriple">
        <div class="form-group">
              <label for="numeroBloquearTriple" class="col-form-label">Numero a bloquear</label>
              <input type="text" class="form-control" id="numeroBloquearTriple" name="numeroBloquearTriple" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <input type="hidden" name="tipo_de_rifasTriple" id="tipo_de_rifasTriple" value="4">
        </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="bloqueoNumeroTriple()" value="Bloquear">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>