
const RegistroNumeroMoto = async()=>{
    var numero = document.querySelector("#numeroMoto").value;
    var zodiaco = document.querySelector("#zodiaco").value;
    var nombreApellido = document.querySelector("#nombreApellido").value;
    var cedula = document.querySelector("#cedula").value;
    var vendedor = document.querySelector("#vendedor").value;
    var fecha = document.querySelector("#fecha").value;
    var tipoDeRifa = document.querySelector("#tipo_de_rifa_moto").value;
    var metodoDePago = document.querySelector('input[name="metodoDePagoMoto"]:checked').value;
    var ReferenciaPagoMovil = document.querySelector("#ReferenciaPagoMovilNA").value;
    var cantidadDivisas = document.querySelector("#cantidadDivisasNA").value;
    var cantidadDeBolivares = document.querySelector("#cantidadBolivaresNA").value;
    var montoBolivares = document.querySelector("#montoBolivaresNA").value;
    var valores = []; 
    for (var i = 0; i < metodoDePago.length; i++) {
      valores.push(metodoDePago[i].value);
  }

    if (nombreApellido.trim() === '' ||
        cedula.trim() === '' ||
        numero.trim() === '' ||
        zodiaco.trim() === '' ||
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
    if (!validarNumeroDeRifaMoto(numero)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar el numero en el formato correcto.",
          });
        return;
    }
    if (numero > 99) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Los numeros permitdos son del 00 al 99.",
      });
    return;
    }
    if (zodiaco == '') {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe seleccionar un signo del zodiaco.",
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
    datos.append("vendedor", vendedor);
    datos.append("nombreApellido", nombreApellido);
    datos.append("cedula", cedula);
    datos.append("numero", numero);
    datos.append("zodiaco", zodiaco);
    datos.append("fecha", fecha);
    datos.append("tipo_de_rifa", tipoDeRifa)
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

    // Envio de datos al backend
    var respuesta = await fetch("php/registroMotoRifa.php", {
      method: 'POST',
      body: datos
    })

    var resultado=await respuesta.json();
  
    if (resultado.success == true) {
      Swal.fire({
        icon: "success",
        title: "EXITO",
        text: resultado.mensaje,
        footer: '<a href="report/pdf/ticketRifaMoto.php?irmd='+ resultado.ticket +'" class="btn btn-primary" target="_blank">Ticket</a>'
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