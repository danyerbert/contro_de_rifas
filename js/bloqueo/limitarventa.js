const limitarVenta = async() => {
    var cantidadVenta = document.querySelector("#cantidadVenta").value;
    var rifaSeleccion = document.querySelector("#rifaSeleccion").value;

    if (
        cantidadVenta.trim() === '' ||
        rifaSeleccion.trim() === ''
    ) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Faltan Campos por completar",
          });
        return;
    }

    const datos = new FormData();

    datos.append("cantidadVenta", cantidadVenta);
    datos.append("rifaSeleccion", rifaSeleccion);

    var respuesta = await fetch("php/bloquear/limite-venta.php", {
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
        document.querySelector("#limiteDeVenta").reset();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}