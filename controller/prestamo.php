<?php
include_once("/xampp/htdocs/PacificBank/model/conexion.php");
include_once("/xampp/htdocs/PacificBank/controller/prestamo.php");

include_once("/xampp/htdocs/PacificBank/controller/hello.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "Solicitar") {
    // Obtener datos del formulario
    $cantidad = $_POST["cantidad"];
    $motivo = $_POST["motivo"];

    // Validar datos
    if (empty($cantidad) || empty($motivo)) {
        $errorPrestamo = "Por favor, completa todos los campos.";
    } else {
        // Llamar a la función para solicitar préstamo
        $resultPrestamo = solicitarPrestamo($conn, $nombreUsuario, $cantidad, $motivo);

        // Mostrar mensajes de error o éxito después de la operación
        if (isset($resultPrestamo['error']) && !empty($resultPrestamo['error'])) {
            $errorPrestamo = $resultPrestamo['error'];
        } elseif (!empty($resultPrestamo)) {
            $exitoPrestamo = "Solicitud de préstamo realizada con éxito.";
        }
    }
}

function solicitarPrestamo($conn, $nombreUsuario, $cantidad, $motivo) {
    // Validar los datos
    if (!is_numeric($cantidad) || $cantidad <= 0) {
        return array('error' => 'La cantidad del préstamo debe ser un número positivo.');
    }

    // Puedes agregar más validaciones según tus requisitos

    // Lógica para solicitar un préstamo
    try {
        // Inicia una transacción para asegurar operaciones atómicas
        $conn->beginTransaction();

        // Obtén el ID del usuario
        $stmt = $conn->prepare("SELECT ID FROM Usuarios WHERE Username = :nombreUsuario");
        $stmt->bindParam(':nombreUsuario', $nombreUsuario);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $usuarioID = $row['ID'];

        // Inserta la solicitud de préstamo en la tabla Prestamos
        $stmt = $conn->prepare("INSERT INTO Prestamos (UsuarioID, Monto, TasaInteres, CuotasTotales, CuotasRestantes) VALUES (:usuarioID, :monto, :tasaInteres, :cuotasTotales, :cuotasRestantes)");
        $stmt->bindParam(':usuarioID', $usuarioID);
        $stmt->bindParam(':monto', $cantidad);
        // Puedes ajustar la tasa de interés y el número de cuotas según tus requisitos
        $stmt->bindValue(':tasaInteres', 0.05);
        $stmt->bindValue(':cuotasTotales', 12);
        $stmt->bindValue(':cuotasRestantes', 12);
        $stmt->execute();

        // Realiza otras operaciones relacionadas con la solicitud de préstamo si es necesario

        // Confirma la transacción
        $conn->commit();

        return array('success' => true, 'message' => 'Préstamo solicitado con éxito');
    } catch (PDOException $e) {
        // Si hay algún error, revierte la transacción
        $conn->rollBack();
        return array('error' => 'Error al solicitar el préstamo: ' . $e->getMessage());
    }
}
?>
