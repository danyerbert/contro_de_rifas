<!-- Modal -->
<div class="modal fade" id="BloquearNumeroMoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Bloquear Numero de Rifa Moto</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		    </button>
      </div>
      <div class="modal-body">
        <form id="bloqueoNumeroMoto">
        <div class="form-group">
              <label for="numeroBloquearMoto" class="col-form-label">Numero a bloquear</label>
              <input type="text" class="form-control" id="numeroBloquearMoto" name="numeroBloquearMoto" pattern="[0-9]{2}" maxlength="2" minlength="2">
          </div>
          <input type="hidden" name="tipo_de_rifasMoto" id="tipo_de_rifasMoto" value="1">
        </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="BloquearNumeroMoto()" value="Bloquear">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>