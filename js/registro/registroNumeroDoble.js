const RegistroDeDobleOportunidad = async() => {
    var numero = document.querySelector("#numeroDoble").value;
    var nombreApellido = document.querySelector("#nombreApellidoDoble").value;
    var cedula = document.querySelector("#cedulaDoble").value;
    var cedulaVendedor = document.querySelector("#cedulaVendedorDoble").value;
    var fecha = document.querySelector("#fechaDoble").value;
    var tipoDeRifa = document.querySelector("#tipo_de_rifa_doble").value;
    if (numero.trim() === '' ||
        nombreApellido.trim() === '' ||
        cedula.trim() === '' ||
        tipoDeRifa.trim() === '' ||
        cedulaVendedor.trim() === ''||
        fecha.trim() === ''){
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Faltan Campos por completar",
              });
            return;
    }

    // Validaciones de campos de comprador.

    if (!validarnombre(nombreApellido)) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "El nombre no cumple con los caracteres especificos.",
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
    if (!validarNumeroDobleOportunidad(numero)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar el numero en el formato correcto.",
          });
        return;
    }
    if (numero > 999) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Los numeros permitdos son del 00 al 99.",
      });
    return;
    }
    if (!validarcedula(cedulaVendedor)) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "La cedula del vendedor no cumple con los caracteres establecidos.",
      });
    return;
  }
    // Envio de datos
    const datos=new FormData();
    datos.append("cedulaVendedor", cedulaVendedor);
    datos.append("nombreApellido", nombreApellido);
    datos.append("cedula", cedula);
    datos.append("tipo_de_rifa", tipoDeRifa);
    datos.append("numero", numero);
    datos.append("fecha", fecha);

    var respuesta = await fetch("php/registroDobleRifa.php", {
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
      document.querySelector("#registroNumeroMoto").reset();
    }else{
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: resultado.mensaje,
      });
    }
}