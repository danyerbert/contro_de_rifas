<!-- Modal -->
<div class="modal fade" id="crearUsuario<?php echo $row['cedula'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php
       //Convertimos en minuscula la cadena de caracteres
        $mNombre = strtolower($row['nombre']);
        $mApellido = strtolower($row['apellido']);

        $cedulaVendedor = $row['cedula'];
        //Extraemos el primer caracter del nombre
        $pNombre = substr($mNombre, 0, 1);
        //Generamos el usuario con la primera letra del nombre + el apellido
        $usuario = $pNombre . $mApellido;
        //Generar Password 
        $pMnombre = substr($row['nombre'], 0, 1);
        $password = $pMnombre . $mApellido . "#" . $cedulaVendedor;
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Usuario para: <?php echo $row['nombre'];?>
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <form action="" id="crearUsuario">
                    <div class="form-group">
                        <label for="nombreApellido">usuario</label>
                        <input class="form-control" id="usuario" name="usuario" type="text"
                            placeholder="<?php echo $usuario;?>" value="<?php echo $usuario;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="cedula">Apellido</label>
                        <input class="form-control" id="password" name="password" type="text"
                            placeholder="<?php echo $password;?>" value="<?php echo $password;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="rol" class="col-form-label">Selecciona la rifa:</label>
                        <select name="rol" id="rol" class="form-control form-control-lg">
                            <?php foreach ($resultadoRoles as $rowRol) : ?>
                            <option value="<?php echo $rowRol['id']; ?>"><?php echo $rowRol['roles']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" name="cedulaUsuario" id="cedulaUsuario" value="<?php echo $row['cedula']?>">
                    <input type="hidden" name="rol" id="rol" value="2">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" onclick="RegistroUsuario()" value="Guardar">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>

</div>
</div>