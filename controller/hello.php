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

        // Establecer la configuración regional a español
        setlocale(LC_TIME, 'es_ES.UTF-8');

        // Configurar el objeto DateTime con la zona horaria adecuada
        date_default_timezone_set('Europe/Paris');
        $dateTimeObj = new DateTime('now', new DateTimeZone('Europe/Paris'));

        // Formatear la fecha según tus preferencias
        $dateFormatted = IntlDateFormatter::formatObject(
            $dateTimeObj,
            'd \'de\' MMMM y',
            'es'
        );
        

       
    } else {
        echo "Usuario no encontrado";
    }
} else {
    // Si el usuario no ha iniciado sesión, redirige o toma alguna acción
    echo "Usuario no ha iniciado sesión";
}
?>
