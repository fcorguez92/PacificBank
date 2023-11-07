<?php
include_once('../Model/model.php');
// Obtener datos del formulario
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$saldo = $_POST['saldo'];

// Consulta para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (nombre, contraseña, saldo) VALUES ('$nombre', '$contraseña', '$saldo')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
