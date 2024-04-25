
<!-- Modal -->
<div class="modal fade" id="crearUsuario<?php echo $row['cedula'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Usuario para: <?php echo $row['nombre'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="" id="crearUsuario">
          <div class="form-group">
              <label for="nombreApellido">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario" pattern="[a-zA-Z\s]{4,20}">
          </div>
        <div class="form-group">
              <label for="cedula">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,25}">
        </div>

          <input type="hidden" name="cedulaUsuario" id="cedulaUsuario" value="<?php echo $row['cedula']?>">
          <input type="hidden" name="rol" id="rol" value="2">
        </form>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="RegistroUsuario()" value="Guardar">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
    
  </div>
</div>