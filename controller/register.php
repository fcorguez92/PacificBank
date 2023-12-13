<?php
include_once("../../model/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Se recomienda almacenar hashes de contraseñas

    // Verificamos si el usuario ya existe
    $stmt = $conn->prepare("SELECT ID FROM Usuarios WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo '<script>alert("El nombre de usuario ya está en uso. Por favor, elige otro."); window.location.href = "/PacificBank/view/blocks/register.php";</script>';
    } else {
        // Insertamos el nuevo usuario en la base de datos
        $insertStmt = $conn->prepare("INSERT INTO Usuarios (Username, Pass, Email) VALUES (?, ?, ?)");
        $insertStmt->bind_param("sss", $username, $password, $email);

        if ($insertStmt->execute()) {
            // Obtener el ID del usuario recién insertado
            $usuarioID = $insertStmt->insert_id;

            // Generar el IBAN y insertarlo en la tabla Cuentas
            $iban = generarIBAN($username, $conn);
            $insertIbanStmt = $conn->prepare("INSERT INTO Cuentas (UsuarioID, IBAN) VALUES (?, ?)");
            $insertIbanStmt->bind_param("is", $usuarioID, $iban);
            $insertIbanStmt->execute();

            // Registro exitoso
            echo '<script>alert("Registro exitoso. Ahora puedes iniciar sesión."); window.location.href = "/PacificBank";</script>';
        } else {
            // Error al registrar el usuario
            echo '<script>alert("Error al registrar el usuario. Por favor, inténtalo de nuevo.");</script>';
        }

        $insertStmt->close();
        $insertIbanStmt->close();
    }

    $stmt->close();
}

$conn->close();

// Función para generar el IBAN
function generarIBAN($username, $conn) {
    // Convertir las primeras cuatro letras del nombre de usuario a binario y concatenarlas
    $nombreBinario = substr(base_convert(strtoupper($username), 36, 2), 0, 4);

    // Verificar si el IBAN ya existe en la base de datos
    $ibanExistente = true;
    $ibanGenerado = '';

    while ($ibanExistente) {
        // Concatenar "z" hasta llegar a las 4 letras requeridas
        $nombreBinario .= str_repeat("z", 4 - strlen($nombreBinario));

        // Agregar "1" o "0" para hacer el IBAN único
        $ibanGenerado = $nombreBinario . (string)rand(0, 1);

        // Verificar si el IBAN ya existe en la base de datos
        $stmt = $conn->prepare("SELECT ID FROM Cuentas WHERE IBAN = ?");
        $stmt->bind_param("s", $ibanGenerado);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            $ibanExistente = false; // IBAN único encontrado
        }
    }

    $stmt->close();

    return $ibanGenerado;
}
?>
