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
        title: "Fallo al registrar",
        text: resultado.mensaje,
      });
    }
    
}