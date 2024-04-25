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

    if (
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