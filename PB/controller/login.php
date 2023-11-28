<?php
// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validar los datos (puedes agregar más validaciones según tus necesidades)
    if (empty($username) || empty($password)) {
        echo "Por favor, completa todos los campos.";
    } else {
        // Aquí puedes realizar la autenticación, por ejemplo, consultando una base de datos
        // En este ejemplo, se compara el usuario y la contraseña con valores fijos
        $user = "usuario";
        $pass = "contrasena";

        if ($username === $user && $password === $pass) {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION["username"] = $username;
            header("Location: welcome.php"); // Redirigir a la página de bienvenida
            exit();
        } else {
            // Credenciales incorrectas
            echo "Usuario o contraseña incorrectos.";
        }
    }
}
?>
