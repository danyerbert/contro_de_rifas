const registroTriple2 = async() =>{
    var numero = document.querySelector("#numeroTriple").value;
    var cantidadApostada = document.querySelector("#cantidad_apuesta").value;
    var nombreApellido = document.querySelector("#nombreApellidoTriple").value;
    var cedula = document.querySelector("#cedulaTriple").value;
    var vendedor = document.querySelector("#vendedorTriple").value;
    var fecha = document.querySelector("#fechaTriple").value;
    var tipoDeRifa = document.querySelector("#tipo_de_rifa_triple").value;
    var valoresSeleccionados = [];
    var checkboxes = document.querySelectorAll('input[name="loteria"]:checked');
    var metodoDePago = document.querySelector('input[name="metodoDePagoTriple"]:checked').value;
    var ReferenciaPagoMovil = document.querySelector("#ReferenciaPagoMovilTri").value;
    var cantidadDivisas = document.querySelector("#cantidadDivisasTri").value;
    var cantidadDeBolivares = document.querySelector("#cantidadBolivaresTri").value;
    var valores = []; 
    for (var i = 0; i < metodoDePago.length; i++) {
      valores.push(metodoDePago[i].value);
  }
  

    for (var i = 0; i < checkboxes.length; i++) {
        valoresSeleccionados.push(checkboxes[i].value);
    }

    if (nombreApellido.trim() === '' ||
        cedula.trim() === '' ||
        numero.trim() === '' ||
        cantidadApostada.trim() === '' ||
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
    datos.append("cantidad", cantidadApostada);
    datos.append("fecha", fecha);
    datos.append("tipo_de_rifa_triple", tipoDeRifa);
    datos.append("loterias", valoresSeleccionados);
    switch (metodoDePago) {
      case "1":
        datos.append("metodoDePago", metodoDePago); 
        datos.append("referencia", ReferenciaPagoMovil); 
        console.log(ReferenciaPagoMovil);
        break;
      case "2":
        datos.append("metodoDePago", metodoDePago); 
        datos.append("referencia", cantidadDivisas);
        console.log(cantidadDivisas); 
        break;
      case "3":
        datos.append("metodoDePago", metodoDePago); 
        datos.append("referencia", cantidadDeBolivares);
        console.log(cantidadDeBolivares); 
        break;
    }

    // Envio de datos al backend
    var respuesta = await fetch("php/registroTripleRifa.php", {
      method: 'POST',
      body: datos
    })

    var resultado=await respuesta.json();
  
    if (resultado.success == true) {
        if (cantidadApostada.trim() == 3 ||
            cantidadApostada.trim() > 3      
      ) {
          Swal.fire({
            icon: "success",
            title: "Registrado",
            text: resultado.mensaje,
            footer: '<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AcumuladoTriple">Partica Acumulado.</a>'
          });
        }else{
          Swal.fire({
            icon: "success",
            title: "Registrado",
            text: resultado.mensaje,
          });
        }
      
      document.querySelector("#registroNumeroTriple").reset();
    }else{
      Swal.fire({
        icon: "error",
        title: "Fallo",
        text: resultado.mensaje,
      });
    }
    
}