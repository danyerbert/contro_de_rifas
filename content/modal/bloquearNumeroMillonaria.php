<!-- Modal -->
<div class="modal fade" id="BloquearNumeroMillonaria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Bloquear Numero de Rifa Millonaria</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		    </button>
      </div>
      <div class="modal-body">
        <form id="bloqueoNumeroMillonaria">
        <div class="form-group">
              <label for="numeroBloquearMillonaria" class="col-form-label">Numero a bloquear</label>
              <input type="text" class="form-control" id="numeroBloquearMillonaria" name="numeroBloquearMillonaria" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <input type="hidden" name="tipo_de_rifasMillonaria" id="tipo_de_rifasMillonaria" value="3">
        </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="BloquearNumeroMillonaria()" value="Bloquear">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>