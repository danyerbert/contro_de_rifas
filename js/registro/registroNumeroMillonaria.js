const RegistroNumeroMillonaria = async() =>{
    var nombreApellido = document.querySelector("#nombreMillonaria").value;
    var cedula = document.querySelector("#cedulaMillonaria").value;
    var vendedor = document.querySelector("#vendedorMillonario").value;
    var fecha = document.querySelector("#fechaMillonario").value;
    var numeroOne = document.querySelector("#numeroMillonario1").value;
    var numeroDos = document.querySelector("#numeroMillonario2").value;
    var numeroTres = document.querySelector("#numeroMillonario3").value;
    var numeroCuatro = document.querySelector("#numeroMillonario4").value;
    var numeroCinco = document.querySelector("#numeroMillonario5").value;
    var tipoDeRifa = document.querySelector("#tipo_de_rifa_millonaria").value;
    var metodoDePago = document.querySelector('input[name="metodoDePagoMillo"]:checked').value;
    var ReferenciaPagoMovil = document.querySelector("#ReferenciaPagoMovilMi").value;
    var cantidadDivisas = document.querySelector("#cantidadDivisasMi").value;
    var cantidadDeBolivares = document.querySelector("#cantidadBolivaresMi").value;
    var montoBolivares = document.querySelector("#montoBolivaresMi").value;
    var valores = []; 
    for (var i = 0; i < metodoDePago.length; i++) {
      valores.push(metodoDePago[i].value);
  }

    if (nombreApellido.trim() === '' ||
        cedula.trim() === '' ||
        numeroOne.trim() === ''|| 
        numeroDos.trim() === ''|| 
        numeroTres.trim() === ''|| 
        numeroCuatro.trim() === ''|| 
        numeroCinco.trim() === ''|| 
        vendedor.trim() === '' ||
        fecha.trim() === ''||
        tipoDeRifa.trim() === ''
    ) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Faltan Campos por completar",
          });
        return;
    }
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
    if (numeroOne > 999) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Los numeros permitdos son del 000 al 999.",
        });
      return;
      }
      if (numeroDos > 999) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Los numeros permitdos son del 000 al 999.",
        });
      return;
      }
      if (numeroTres > 999) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Los numeros permitdos son del 000 al 999.",
        });
      return;
      }
      if (numeroCuatro > 999) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Los numeros permitdos son del 000 al 999.",
        });
      return;
      }
      if (numeroCinco > 999) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Los numeros permitdos son del 000 al 999.",
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

    const datos = new FormData();

    datos.append("nombre", nombreApellido);
    datos.append("cedula", cedula);
    datos.append("numeroOne", numeroOne);
    datos.append("numeroDos", numeroDos);
    datos.append("numeroTres", numeroTres);
    datos.append("numeroCuatro", numeroCuatro);
    datos.append("numeroCinco", numeroCinco);
    datos.append("vendedor", vendedor);
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

    var respuesta = await fetch("php/registroMillonario.php", {
        method: 'POST',
        body: datos
      })
  
      var resultado=await respuesta.json();
    
      if (resultado.success == true) {
        Swal.fire({
          icon: "success",
          title: "EXITO",
          text: resultado.mensaje,
          footer: '<a href="report/pdf/ticketRifaMillonaria.php?irmm='+ resultado.ticket +'" class="btn btn-primary" target="_blank">Ticket</a>'
        });
        document.querySelector("#rifamillonaria").reset();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}