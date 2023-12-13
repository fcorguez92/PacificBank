function validarFormulario() {
  let username = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirmPassword").value;

  // Limpiar mensajes de error
  ocultarError("usernameError");
  ocultarError("emailError");
  ocultarError("passwordError");
  ocultarError("confirmPasswordError");

  // Validar nombre de usuario
  if (username.trim() === "") {
    mostrarError("usernameError", "Por favor, ingresa un nombre de usuario.");
    return false;
  }

  // Validar correo electrónico
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    mostrarError("emailError", "Por favor, ingresa un correo electrónico válido.");
    return false;
  }

  // Validar contraseña
  if (password.trim() === "") {
    mostrarError("passwordError", "Por favor, ingresa una contraseña.");
    return false;
  }

  // Validar confirmación de contraseña
  if (confirmPassword.trim() === "") {
    mostrarError("confirmPasswordError", "Por favor, confirma tu contraseña.");
    return false;
  }

  // Comprobar contraseñas iguales
  if (password !== confirmPassword) {
    mostrarError("passwordError", "Las contraseñas no coinciden");
    mostrarError("confirmPasswordError", "Las contraseñas no coinciden");
    return false;
  }

  // Si todas las validaciones pasan, retorna true
  return true;
}

function validarYEnviar() {
  // Llamamos a la función de validación
  if (validarFormulario()) {
    // Si la validación es exitosa, enviamos el formulario
    document.getElementById("registroForm").submit();
  }
}

function mostrarError(idError, mensaje) {
  var elementoError = document.getElementById(idError);
  elementoError.innerHTML = mensaje;
  elementoError.style.display = "block"; // Mostrar el mensaje de error
}

function ocultarError(idError) {
  var elementoError = document.getElementById(idError);
  elementoError.innerHTML = "";
  elementoError.style.display = "none"; // Ocultar el mensaje de error
}
