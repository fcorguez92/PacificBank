<?php
include_once("/xampp/htdocs/PacificBank/model/conexion.php");
include_once("/xampp/htdocs/PacificBank/controller/saldo.php");

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $tipoUsuario = $_SESSION['tipoUsuario'];
    $userID = $_SESSION['usuarioID'];

    // Obtener el nombre del usuario y el id
    $sql = "SELECT Username FROM Usuarios WHERE Username = '$username'";
    $resultUsername = $conn->query($sql);
    $rowUsername = $resultUsername->fetch_assoc();
    $username = $rowUsername['Username'];

    $sql = "SELECT id FROM Usuarios WHERE id = '$userID'";
    $resultID = $conn->query($sql);
    $rowID = $resultID->fetch_assoc();
    $userID = $rowID['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cantidad = $_POST["cantidad"];
    $motivo = $_POST["motivo"];
    
    // Verificar si el monto pedido es mayor al saldo del usuario
    // Supongamos que tienes el ID del usuario almacenado en $usuarioID
    $saldoUsuario = obtenerSaldoConvertido($conn, $username); 
    
    if ($cantidad > $saldoUsuario) {
        echo "Error: La cantidad pedida es mayor al saldo disponible.";
        // Puedes redirigir o manejar el error según tus necesidades
    } else {
        // Calcular la tasa de interés según el monto solicitado
        $tasaInteres = calcularTasaInteres($cantidad);
        
        // Establecer otros valores fijos
        $cuotasTotales = 24;
        $cuotasRestantes = $cuotasTotales;
        
        // Insertar el préstamo en la base de datos
        $query = "INSERT INTO Prestamos (ID, Monto, TasaInteres, CuotasTotales, CuotasRestantes, Motivo)
                  VALUES ('$userID', '$cantidad', '$tasaInteres', '$cuotasTotales', '$cuotasRestantes', '$motivo')";

if (mysqli_query($conn, $query)) {
    echo "Préstamo registrado exitosamente.";
    // Puedes redirigir o mostrar un mensaje de éxito según tus necesidades
} else {
    echo "Error al registrar el préstamo: " . mysqli_error($conexion);
}
}
}
}
// Función para calcular la tasa de interés según el monto
function calcularTasaInteres($cantidad) {
    if ($cantidad <= 1000) {
        return 0.03;
    } elseif ($cantidad <= 2000) {
        return 0.05;
    } else {
        return 0.07;
    }
}


?>
