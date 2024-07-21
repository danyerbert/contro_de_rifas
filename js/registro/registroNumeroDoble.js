const RegistroDeDobleOportunidad = async() => {
    var numero = document.querySelector("#numeroDoble").value;
    var nombreApellido = document.querySelector("#nombreApellidoDoble").value;
    var cedula = document.querySelector("#cedulaDoble").value;
    var cedulaVendedor = document.querySelector("#cedulaVendedorDoble").value;
    var fecha = document.querySelector("#fechaDoble").value;
    var tipoDeRifa = document.querySelector("#tipo_de_rifa_doble").value;
    var metodoDePago = document.querySelector('input[name="metodoDePagoRoyal"]:checked').value;
    var ReferenciaPagoMovil = document.querySelector("#ReferenciaPagoMovilRoyala").value;
    var cantidadDivisas = document.querySelector("#cantidadDivisasRoyala").value;
    var cantidadDeBolivares = document.querySelector("#cantidadBolivaresROYALa").value;
    var montoBolivares = document.querySelector("#montoBolivaresRoyala").value;
    var valores = []; 
    for (var i = 0; i < metodoDePago.length; i++) {
      valores.push(metodoDePago[i].value);
  }
    if (numero.trim() === '' ||
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
        text: "El nombre no cumple con los caracteres establecidos.",
      });
    return;
  }  

  if (!validarcedula(cedula)) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Debe ingresar la cedula en el formato correcto.",
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
  
  switch (metodoDePago) {
    case "1":
        if (!validadPagoMovil(ReferenciaPagoMovil)) {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar numeros en la referencia",
          });
        return;
        }
        if (!validarMontoBolivares(montoBolivares)) {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar el monto correspondiente",
          });
        return;
        }
      break;
    case "2": 
        if (!validarDivisas(cantidadDivisas)) {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar el monto en numeros.",
          });
        return;
        }
      break
      case "3":
          if (!validadBolivares(cantidadDeBolivares)) {
              Swal.fire({
                icon: "error",
                title: "Error",
                text: "Debe ingresar la cantidad en numeros.",
              });
            return;
          } 
        break
  }
    // Envio de datos
    const datos=new FormData();
    datos.append("cedulaVendedor", cedulaVendedor);
    datos.append("nombreApellido", nombreApellido);
    datos.append("cedula", cedula);
    datos.append("tipo_de_rifa", tipoDeRifa);
    datos.append("numero", numero);
    datos.append("fecha", fecha);
    switch (metodoDePago) {
      case "1":
        datos.append("metodoDePago", metodoDePago); 
        datos.append("referencia", ReferenciaPagoMovil);
        datos.append("montoBolivares", montoBolivares); 
        break;
      case "2":
        datos.append("metodoDePago", metodoDePago); 
        datos.append("referencia", cantidadDivisas);
        datos.append("montoBolivares", montoBolivares);
        break;
      case "3":
        datos.append("metodoDePago", metodoDePago); 
        datos.append("referencia", cantidadDeBolivares);
        datos.append("montoBolivares", montoBolivares);
        break;
    }
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
        footer: '<a href="report/pdf/ticketRifaRoyal.php?irroyal='+ resultado.ticket +'" class="btn btn-primary" target="_blank">Ticket</a>'
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