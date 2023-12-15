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
        // Consultar la base de datos para encontrar al usuario
        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Usuario encontrado, verificar la contraseña
            $row = $result->fetch_assoc();
            $storedPassword = $row["Pass"];

            if (password_verify($password, $storedPassword)) {
                // Contraseña válida, inicio de sesión exitoso
                $tipoUsuario = $row["UserType"];
                $usuarioID = $row["ID"];
                $monedaUsuario = $row["Moneda"];

                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["tipoUsuario"] = $tipoUsuario;
                $_SESSION["usuarioID"] = $usuarioID;
                $_SESSION["monedaUsuario"] = $monedaUsuario;

                if ($tipoUsuario == "Administrador") {
                    header("Location: view/blocks/welcome_admin.php");
                } else {
                    header("Location: view/blocks/welcome_user.php");
                }
                exit();
            } else {
                // Contraseña incorrecta
                header("location: /PacificBank");
            }
        } else {
            // Usuario no encontrado
            header("location: /PacificBank");
        }
        $stmt->close();
    }
}
?>
