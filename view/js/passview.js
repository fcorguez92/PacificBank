let passwordInput = document.getElementById('password');
let togglePasswordButton = document.getElementById('togglePassword');

togglePasswordButton.addEventListener('click', function () {
    togglePassword();
});

// Muestra u oculta la contraseña y actualiza el ícono
function togglePassword() {
    let type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    
    // Actualiza el ícono del botón
    togglePasswordButton.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
}

// Puedes usar el siguiente código CSS para cambiar el cursor al pasar sobre el botón
togglePasswordButton.style.cursor = 'pointer';
