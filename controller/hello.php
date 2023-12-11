<?php
// Inicia la sesión (asegúrate de llamar a session_start() al principio de tu script)
session_start();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $tipoUsuario = $_SESSION['tipoUsuario'];

    // Obtener el nombre del usuario y el día de la semana actual
    $sql = "SELECT Username FROM Usuarios WHERE Username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombreUsuario = strtoupper($row["Username"]);
        $diaSemana = date('l');
        date_default_timezone_set('UTC');
        $fecha = date('d  F o');

        // Cerrar la conexión
        $conn->close();
    } else {
        echo "Usuario no encontrado";
    }
} else {
    // Si el usuario no ha iniciado sesión, redirige o toma alguna acción
    echo "Usuario no ha iniciado sesión";
}
?>
