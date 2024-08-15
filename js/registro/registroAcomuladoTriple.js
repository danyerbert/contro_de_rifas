const registroAcomulado = async() => {
    var cedula = document.querySelector("#cedulaAcumulado").value;
    var numeroAcumulado = document.querySelector("#numeroAcumuladoTriple").value;
    var vendedorAcumulado = document.querySelector("#vendedorTripleAcumulado").value;
    var fechaAcumulado = document.querySelector("#fechaTripleAcumulado").value;
    var participaAcumulado = document.querySelector("#ParticipaAcumulado").value;
    var identificador = document.querySelector("#identificador").value;
    var numeroTripleJugado = document.querySelector("#numeroTriple").value;

    if (cedula.trim() === '' ||
        numeroAcumulado.trim() === '' ||
        vendedorAcumulado.trim() === '' ||
        fechaAcumulado.trim() === '' ||
        participaAcumulado.trim() === '' ||
        identificador.trim() === '' ||
        numeroTripleJugado.trim() === '' 
    ) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Faltan Campos por completar",
          });
        return;
    }

    if (!validarNumeroAcomuladoTriple(numeroAcumulado)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar el numero en el formato correcto.",
          });
        return;
    }

    const datos = new FormData();

    datos.append("cedula", cedula);
    datos.append("numero_acomulado", numeroAcumulado);
    datos.append("vendedor", vendedorAcumulado);
    datos.append("fecha", fechaAcumulado);
    datos.append("participacion", participaAcumulado);
    datos.append("identificador", identificador);
    datos.append("numeroTripleJugado", numeroTripleJugado);

    var respuesta = await fetch("php/registroAcomuladoTriple.php", {
        method: 'POST',
        body: datos
      })
  
      var resultado=await respuesta.json();
    
      if (resultado.success == true) {
        Swal.fire({
          icon: "success",
          title: "EXITO",
          text: resultado.mensaje,
          footer: '<a href="report/pdf/ticketAcumulado.php?irta='+ resultado.ticket +'" class="btn btn-primary" target="_blank">Ticket</a>'
        });
        document.querySelector("#registroNumeroAcumuladoTriple").reset();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}