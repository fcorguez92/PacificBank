<?php
// Obtener la lista de usuarios
$sqlUsuarios = "SELECT ID, Username FROM Usuarios";
$resultUsuarios = $conn->query($sqlUsuarios);

// Procesar la solicitud de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = $_POST['usuario_id'];
    $nuevoEmail = $_POST['nuevo_email'];
    $nuevaMoneda = $_POST['nueva_moneda'];

    // Construir la actualización según los campos proporcionados
    $updateSql = "UPDATE Usuarios SET";
    if (!empty($nuevoEmail)) {
        $updateSql .= " Email = '$nuevoEmail',";
    }
    if (!empty($nuevaMoneda)) {
        $updateSql .= " Moneda = '$nuevaMoneda',";
    }

    // Eliminar la coma final si hay campos actualizados
    if (substr($updateSql, -1) == ',') {
        $updateSql = rtrim($updateSql, ',');
    }

    $updateSql .= " WHERE ID = $usuarioID";

    if ($conn->query($updateSql) === TRUE) {
        echo "Perfil actualizado correctamente.";
    } else {
        echo "Error al actualizar el perfil: " . $conn->error;
    }
}
?>