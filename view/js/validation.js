function validarFormulario() {
  // Obtener los valores de los campos
  let username = document.getElementById("username").value.trim();
  let email = document.getElementById("email").value.trim();
  let password = document.getElementById("password").value.trim();
  let confirmPassword = document.getElementById("confirmPassword").value.trim();

  // Limpiar errores
  document.getElementById("usernameError").innerHTML = "";
  document.getElementById("emailError").innerHTML = "";
  document.getElementById("passwordError").innerHTML = "";
  document.getElementById("confirmPasswordError").innerHTML = "";

  // Validar campos
  if (username === "") {
    document.getElementById("username").classList.add("is-invalid");
    document.getElementById("usernameError").innerHTML =
      "Por favor, ingrese un nombre de usuario.";
  } else {
    document.getElementById("username").classList.remove("is-invalid");
    document.getElementById("username").classList.add("is-valid");
  }

  // Validar formato de correo electrónico
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    document.getElementById("email").classList.add("is-invalid");
    document.getElementById("emailError").innerHTML =
      "Por favor, ingrese un correo electrónico válido.";
  } else {
    document.getElementById("email").classList.remove("is-invalid");
    document.getElementById("email").classList.add("is-valid");
  }

  // Validar contraseña
  if (password === "") {
    document.getElementById("password").classList.add("is-invalid");
    document.getElementById("passwordError").innerHTML =
      "Por favor, ingrese una contraseña.";
  } else {
    document.getElementById("password").classList.remove("is-invalid");
    document.getElementById("password").classList.add("is-valid");
  }

  // Validar confirmación de contraseña
  if (confirmPassword !== password) {
    document.getElementById("confirmPassword").classList.add("is-invalid");
    document.getElementById("confirmPasswordError").innerHTML =
      "Las contraseñas no coinciden.";
  } else {
    document.getElementById("confirmPassword").classList.remove("is-invalid");
    document.getElementById("confirmPassword").classList.add("is-valid");
  }
}
