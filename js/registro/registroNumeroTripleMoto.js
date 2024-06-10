const RegistroNumerosTripleMoto = async() =>{
    var nombre = document.querySelector("#nombreApellido").value;
    var cedula = document.querySelector("#cedulaTripleMoto").value;
    var numeroTripleUno = document.querySelector("#numeroMotoTriple1").value;
    var zodiacoUno = document.querySelector("#zodiaco1").value;
    var numeroTripleDos = document.querySelector("#numeroMotoTriple2").value;
    var zodiacoDos = document.querySelector("#zodiaco2").value;
    var vendedorTripleMoto = document.querySelector("#vendedorTripleMoto").value;
    var fechaTripleMoto = document.querySelector("#fechaTripleMoto").value;
    var tipoDeRifaMotoTriple = document.querySelector("#tipo_de_rifa_moto_triple").value;

    if (nombre.trim() === '' ||
        cedula.trim() === '' ||
        numeroTripleUno.trim() === '' ||
        zodiacoUno.trim() === '' ||
        numeroTripleDos.trim() === '' ||
        zodiacoDos.trim() === '' ||
        vendedorTripleMoto.trim() === ''||
        fechaTripleMoto.trim() === '' ||
        tipoDeRifaMotoTriple.trim() === ''){
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Faltan Campos por completar",
              });
            return;
        
    }


     // Validaciones de campos de comprador.
    if (!validarnombre(nombre)) {
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
    if (!validarNumeroDeRifaMotoTriple(numeroTripleUno)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar el numero en el formato correcto.",
          });
        return;
    }
     if (!validarNumeroDeRifaMotoTriple(numeroTripleDos)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar el numero en el formato correcto.",
          });
        return;
    }
    if (numeroTripleUno > 999) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Los numeros permitdos son del 00 al 99.",
      });
    return;
    }
    if (numeroTripleDos > 999) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Los numeros permitdos son del 00 al 99.",
      });
    return;
    }
    if (zodiacoUno == '') {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe seleccionar un signo del zodiaco.",
          });
        return;
    }
    if (zodiacoDos == '') {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe seleccionar un signo del zodiaco.",
          });
        return;
    }

    // Envio datos al backend 

    const datos = new FormData();

    datos.append("nombreApellido", nombre);
    datos.append("cedulaTripleMoto", cedula);
    datos.append("numeroMotoTriple1", numeroTripleUno);
    datos.append("zodiaco1", zodiacoUno);
    datos.append("numeroMotoTriple2", numeroTripleDos);
    datos.append("zodiaco2", zodiacoDos);
    datos.append("vendedorTripleMoto", vendedorTripleMoto);
    datos.append("fechaTripleMoto", fechaTripleMoto);
    datos.append("tipo_de_rifa_moto_triple", tipoDeRifaMotoTriple);

    // Envio de datos al backend
    var respuesta = await fetch("php/registroMotoRifaTriple.php", {
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