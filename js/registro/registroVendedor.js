const RegistrarVendedor = async() =>{
    var cedula = document.querySelector("#cedulaVendedor").value;
    var nombre = document.querySelector("#nombre").value;
    var apellido = document.querySelector("#apellido").value;
    var telefono = document.querySelector("#telefono").value;
    var correo = document.querySelector("#correo").value;

    if (cedula.trim() === ''||
        nombre.trim() === ''||
        apellido.trim()=== '' ||
        telefono.trim()===''||
        correo.trim()=== '') {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Faltan Campos por completar",
              });
            return;
    }
    if (!validarcedula(cedula)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "La cedula no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarnombre(nombre)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El nombre no cumple con los caracteres establecidos.",
          });
        return; 
    }
    if (!validarnombre(apellido)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El apellido no cumple con los caracteres establecidos.",
          });
        return; 
    }
    if (!validarTelefono(telefono)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar solo numeros en el telefono.",
          });
        return; 
    }
    if (!validarcorreo(correo)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El correo no cumple con el formato establecido.",
          });
        return; 
    }
    const datos = new FormData();
    datos.append("cedulaVendedor", cedula);
    datos.append("nombre", nombre);
    datos.append("apellido", apellido);
    datos.append("telefono", telefono);
    datos.append("correo", correo);

    var respuesta = await fetch("php/registroVendedor.php", {
        method: 'POST',
        body: datos
      })
  
      var resultado=await respuesta.json();
    
      if (resultado.success == true) {
        Swal.fire({
          icon: "success",
          title: "EXITO",
          text: resultado.mensaje,
        });
        document.querySelector("#crearVendedor1").reset();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}