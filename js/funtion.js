// Funcion para validar el numero con el formato correcto.

const validarNumeroDeRifaMoto = (numero)=>{
    // return /^([a-zA-Z\s]{2,60})/.test(nombre.trim());
    return /^[0-9]{2}/.test(numero.trim());
}

// Funcion para validar el numero con el formato correcto.

const validarNumeroDobleOportunidad = (numeroDoble)=>{
    // return /^([a-zA-Z\s]{2,60})/.test(nombre.trim());
    return /^[0-9]{3}/.test(numeroDoble.trim());
}

// Funcion para validar el numero con el formato correcto.

const validarNumeroTriple = (numeroTriple)=>{
    return /^[0-9]{3}/.test(numeroTriple.trim());
}

// Funcion para validar el numero con el formato correcto.

const validarNumeroMillonario = (numeroMillonario)=>{
    return /^[0-9]{3}/.test(numeroMillonario.trim());
}


// Validacion de nombre, que comprende solo letras, y con espacio para que pueda escribir el apellido
const validarnombre = (nombre)=>{
    // return /^([a-zA-Z\s]{2,60})/.test(nombre.trim());
    return /^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/.test(nombre.trim());
}

// Validacion de cedula, que comprende los 8 digitos que tiene la cedula
const validarcedula = (cedula) =>{
    return /^[0-9]{7,8}/.test(cedula.trim());
}

// Validacion de campo de telefono
const validarTelefono = (telefono)=>{
    return /^[0-9]{10,11}/.test(telefono.trim());
}
// Validacion de correo con los caracteres solicitados.
const validarcorreo=(correo)=>{    
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(correo.trim());
}


// VALIDACIONES PARA LA PARTE DE CREACION DE USUARIO

// Validacion de usuario, que comprende solo letras, (Estructura por definir)
const validarusuario = (usuario) =>{
    return /^([a-zA-Z]{4,30})/.test(usuario.trim());
}

// Validacion de contraseña de 12 - 16 caracteres, al menos 1 digito, al menos 1 minuscula y al menos 1 mayuscula
const validarpassword=(password)=>{
    // return /^([a-zA-Z0-9]{8,16})/.test(password.trim());
    return /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{12,16}$/.test(password.trim());
}