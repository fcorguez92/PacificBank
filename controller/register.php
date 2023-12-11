<?php

// Definir variables para almacenar los mensajes de error
$username_err = $password_err = $confirm_password_err = $email_err = "";
$username = $password = $confirm_password = $email = "";

// Procesar datos del formulario cuando se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validar el nombre de usuario
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, ingrese un nombre de usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validar la contraseña
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, ingrese una contraseña.";     
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "La contraseña debe tener al menos 6 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validar la confirmación de la contraseña
    if (empty(trim($_POST["confirmPassword"]))) {
        $confirm_password_err = "Por favor, confirme la contraseña.";     
    } else {
        $confirm_password = trim($_POST["confirmPassword"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }

    // Validar el correo electrónico
    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor, ingrese un correo electrónico.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Verificar si no hay errores antes de insertar en la base de datos
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)) {

        // Preparar la declaración de inserción
        $sql = "INSERT INTO Usuarios (Username, Pass, Email) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {

            // Enlazar variables a la declaración preparada como parámetros
            $stmt->bind_param("sss", $param_username, $param_password, $param_email);

            // Establecer parámetros
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hashear la contraseña
            $param_email = $email;

            // Ejecutar la declaración
            if ($stmt->execute()) {
                // Redirigir a la página de inicio de sesión después del registro exitoso
                echo '<script language="javascript">Registro exitoso("juas");</script>';
                header("location: index.php");
            } else {
                echo "Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
            }

            // Cerrar la declaración
            $stmt->close();
        }
    }

    // Cerrar la conexión a la base de datos
    
}
?>