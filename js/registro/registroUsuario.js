const RegistroUsuario = async() =>{
    var cedula = document.querySelector("#cedulaUsuario").value;
    var usuario = document.querySelector("#usuario").value;
    var password = document.querySelector("#password").value;
    var rol = document.querySelector("#rol").value;

    // Validacion de usuarios que no debe estar vacios
    if (cedula.trim() === ''||
        usuario.trim() === ''||
        password.trim() === ''||
        rol.trim()=== '') {
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
            text: "La cedula no cumple con los caracteres establecidos."
          });
        return;
    }
    if (!validarusuario(usuario)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El usuario no cumple con los caracteres establecidos.",
          });
        return;
    }
    // if (!validarpassword(password)) {
    //     Swal.fire({
    //         icon: "error",
    //         title: "Error",
    //         text: "La contrasena no cumple con los caracteres establecidos.",
    //       });
    //     return;
    // }

    const datos = new FormData();
    datos.append("cedulaUsuario", cedula);
    datos.append("usuario", usuario);
    datos.append("password", password);
    datos.append("rol", rol);

    var respuesta = await fetch("php/registroUsuario.php", {
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
        document.querySelector("#crearUsuario").reset();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}