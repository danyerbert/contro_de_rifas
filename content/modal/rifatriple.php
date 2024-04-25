
<!-- Modal -->
<div class="modal fade" id="rifaTriple" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">RIFA DE TRIPLE 500</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="" id="registroNumeroTriple">
          <!-- <br> -->
          <h5 class="modal-title fs-7">Datos del Comprador</h5>
          <div class="form-group">
              <label for="nombreApellidoTriple">Nombre</label>
              <input type="text" class="form-control" id="nombreApellidoTriple" name="nombreApellidoTriple" pattern="[a-zA-Z\s]{4,20}">
          </div>
          <div class="form-group">
              <label for="cedulaTriple">Cedula</label>
              <input type="text" class="form-control" id="cedulaTriple" name="cedulaTriple" pattern="[0-9]{8}">
          </div>
          <br>
          <!-- <hr> -->
          <h5 class="modal-title fs-7">Eleccion del numero</h5>
        <div class="form-group">
              <label for="numeroTriple">Numero</label>
              <input type="text" class="form-control" id="numeroTriple" name="numeroTriple" pattern="[0-9]{3,3}" maxlength="3">
              <span></span>
          </div>
          <div class="form-group">
              <label for="cantidadApuesta">Cantidad Apostada</label>
              <input type="text" class="form-control" id="cantidadApuesta" name="cantidadApuesta" pattern="[0-9]">
              <span></span>
          </div>

          <input type="hidden" name="vendedorTriple" id="vendedorTriple" value="<?php echo $cedula;?>">
          <input type="hidden" name="fechaTriple" id="fechaTriple" value="<?php 
            $fecha = date("Y-m-d");
            echo $fecha;
          ?>">
          <input type="hidden" name="tipo_de_rifa_moto" id="tipo_de_rifa_triple" value="4">
        </form>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-success" onclick="registroTriple()" value="Guardar">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
    
  </div>
</div>