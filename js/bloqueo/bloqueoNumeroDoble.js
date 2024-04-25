const BloquearNumeroDoble = async() =>{
    var numeroBloquear = document.querySelector("#numeroBloquearDoble").value;
    var tipoDeRifa = document.querySelector("#tipo_de_rifasDoble").value;

    if (
        numeroBloquear.trim() === '' ||
        tipoDeRifa.trim() === ''
    ) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Faltan Campos por completar",
          });
        return;
    }
    if (!validarNumeroDeRifaMoto(numeroBloquear)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar el numero en el formato correcto",
          });
        return;
    }
    
    const datos = new FormData();

    datos.append("numeroBloquear", numeroBloquear);
    datos.append("tipo_de_rifa", tipoDeRifa);

    var respuesta = await fetch("php/bloquear/bloquearDoble.php", {
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
        document.querySelector("#bloqueoNumeroDoble").reset();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}