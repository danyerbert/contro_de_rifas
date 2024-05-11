
const RegistroNumeroMoto = async()=>{
    var numero = document.querySelector("#numeroMoto").value;
    var zodiaco = document.querySelector("#zodiaco").value;
    var nombreApellido = document.querySelector("#nombreApellido").value;
    var cedula = document.querySelector("#cedula").value;
    var vendedor = document.querySelector("#vendedor").value;
    var fecha = document.querySelector("#fecha").value;
    var tipoDeRifa = document.querySelector("#tipo_de_rifa_moto").value;
    if (numero.trim() === '' ||
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

    // Envio de datos
    const datos=new FormData();
    datos.append("vendedor", vendedor);
    datos.append("nombreApellido", nombreApellido);
    datos.append("cedula", cedula);
    datos.append("numero", numero);
    datos.append("zodiaco", zodiaco);
    datos.append("fecha", fecha);
    datos.append("tipo_de_rifa", tipoDeRifa)

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