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
        // Incluir el archivo de conexión a la base de datos
        include_once __DIR__ . "/../model/conexion.php";
        // Consultar la base de datos para encontrar al usuario
        $sql = "SELECT * FROM usuarios WHERE username = '$username' AND pass = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION["username"] = $username;
            header("Location: view/blocks/welcome.php"); // Redirigir a la página de bienvenida
            exit();
        } else {
            // Credenciales incorrectas
            header("/PacificBank");
        }
    }
}
?>
