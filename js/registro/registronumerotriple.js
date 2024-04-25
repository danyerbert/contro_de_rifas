const registroTriple = async() =>{
    var numero = document.querySelector("#numeroTriple").value;
    var cantidadApostada = document.querySelector("#cantidadApuesta").value;
    var nombreApellido = document.querySelector("#nombreApellidoTriple").value;
    var cedula = document.querySelector("#cedulaTriple").value;
    var vendedor = document.querySelector("#vendedorTriple").value;
    var fecha = document.querySelector("#fechaTriple").value;
    var tipoDeRifa = document.querySelector("#tipo_de_rifa_triple").value;

    if (numero.trim() === '' ||
        cantidadApostada.trim() === '' ||
        nombreApellido.trim() === '' ||
        cedula.trim() === '' ||
        vendedor.trim() === ''||
        fecha.trim() === '' ||
        tipoDeRifa.trim() === ''){
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
    if (!validarNumeroTriple(numero)) {
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

    if (!validarcedula(vendedor)) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "La cedula del vendedor no cumple con los caracteres establecidos.",
        });
      return;
    }

    // Envio de datos
    const datos=new FormData();
    datos.append("vendedor", vendedor);
    datos.append("nombreApellido", nombreApellido);
    datos.append("cedula", cedula);
    datos.append("numero", numero);
    datos.append("cantidad", cantidadApostada);
    datos.append("fecha", fecha);
    datos.append("tipo_de_rifa_triple", tipoDeRifa);

    // Envio de datos al backend
    var respuesta = await fetch("php/registroTripleRifa.php", {
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
      document.querySelector("#registroNumeroTriple").reset();
    }else{
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: resultado.mensaje,
      });
    }
    
}