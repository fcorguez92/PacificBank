<?php
// Obtener la lista de usuarios
$sqlUsuarios = "SELECT ID, Username FROM Usuarios";
$resultUsuarios = $conn->query($sqlUsuarios);

// Procesar la solicitud de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = $_POST['usuario_id'];
    $nuevoEmail = $_POST['nuevo_email'];
    $nuevaMoneda = $_POST['nueva_moneda'];

    // Actualizar datos del usuario
    $updateSql = "UPDATE Usuarios SET Email = '$nuevoEmail', Moneda = '$nuevaMoneda' WHERE ID = $usuarioID";
    
    if ($conn->query($updateSql) === TRUE) {
        echo "Perfil actualizado correctamente.";
    } else {
        echo "Error al actualizar el perfil: " . $conn->error;
    }
}
?>