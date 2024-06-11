
<!-- Modal -->
<div class="modal fade" id="crearVendedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Registrar Vendedor</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
    </div>
    <div class="modal-body">
        <form action="" id="crearVendedor1">
        <div class="form-group">
              <label for="cedula">Cedula</label>
              <input type="text" class="form-control" id="cedulaVendedor" name="cedulaVendedor" pattern="[0-9]{7,8}">
          </div>
          <div class="form-group">
              <label for="nombreApellido">Nombre y Apellido</label>
              <input type="text" class="form-control" id="nombreApellido" name="nombreApellido" pattern="[a-zA-Z\s]{4,20}">
          </div>
          <div class="form-group">
              <label for="telefono">telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]{11}">
          </div>
          <div class="form-group">
              <label for="telefono">Correo</label>
              <input type="email" class="form-control" id="correo" name="correo">
          </div>
        </form>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="RegistrarVendedor()" value="Guardar">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    
  </div>
</div>