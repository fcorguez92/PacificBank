<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pacificbank";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
