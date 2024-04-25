<!-- Modal -->
<div class="modal fade" id="BloquearNumeroMillonaria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Bloquear Numero de Rifa Millonaria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="bloqueoNumeroMillonaria">
        <div class="form-group">
              <label for="numeroBloquearMillonaria">Numero a bloquear</label>
              <input type="text" class="form-control" id="numeroBloquearMillonaria" name="numeroBloquearMillonaria" pattern="[0-9]{3}" maxlength="3" minlength="3">
          </div>
          <input type="hidden" name="tipo_de_rifasMillonaria" id="tipo_de_rifasMillonaria" value="3">
        </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="BloquearNumeroMillonaria()" value="Bloquear">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>