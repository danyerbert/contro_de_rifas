<!-- Modal -->
<div class="modal fade" id="BloquearNumeroDoble" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Bloquear Numero de Rifa Doble</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		    </button>
      </div>
      <div class="modal-body">
        <form id="bloqueoNumeroDoble">
        <div class="form-group">
              <label for="numeroBloquearDoble" class="col-form-label">Numero a bloquear</label>
              <input type="text" class="form-control" id="numeroBloquearDoble" name="numeroBloquearDoble" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <input type="hidden" name="tipo_de_rifas" id="tipo_de_rifasDoble" value="2">
        </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="BloquearNumeroDoble()" value="Bloquear">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>