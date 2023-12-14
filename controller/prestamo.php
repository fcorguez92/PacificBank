<?php
include_once("/xampp/htdocs/PacificBank/model/conexion.php");
include_once("/xampp/htdocs/PacificBank/controller/saldo.php");

// Verifica si 'usuarioID' está definido en la sesión
if (isset($_SESSION['usuarioID'])) {
    $username = $_SESSION['username'];
    $tipoUsuario = $_SESSION['tipoUsuario'];
    $userID = $_SESSION['usuarioID'];

    // Obtener el nombre del usuario y el ID
    $sqlUsername = "SELECT Username FROM Usuarios WHERE Username = '$username'";
    $resultUsername = $conn->query($sqlUsername);
    $rowUsername = $resultUsername->fetch_assoc();
    $username = $rowUsername['Username'];

    $sqlUserID = "SELECT id FROM Usuarios WHERE id = '$userID'";
    $resultID = $conn->query($sqlUserID);
    $rowID = $resultID->fetch_assoc();
    $userID = $rowID['id'];

    // Obtener el saldo del usuario
    $sqlSaldo = "SELECT Saldo FROM Cuentas WHERE UsuarioID = '$userID'";
    $resultSaldo = $conn->query($sqlSaldo);
    $rowSaldo = $resultSaldo->fetch_assoc();
    $saldoUsuario = $rowSaldo['Saldo'];

    // Comprobar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $cantidad = $_POST["cantidad"];
        $motivo = $_POST["motivo"];

        // Verificar si el monto pedido es mayor al saldo del usuario
        if ($cantidad > $saldoUsuario) {
            echo "Error: La cantidad pedida es mayor al saldo disponible.";
            // Puedes redirigir o manejar el error según tus necesidades
        } else {
            // Calcular la tasa de interés según el monto solicitado
            $tasaInteres = calcularTasaInteres($cantidad);

            // Establecer otros valores fijos
            $cuotasTotales = 24;
            $cuotasRestantes = $cuotasTotales;

            // Iniciar transacción
            mysqli_autocommit($conn, false);

            // Insertar el préstamo en la base de datos
            $query1 = "INSERT INTO Prestamos (UsuarioID, Monto, TasaInteres, CuotasTotales, CuotasRestantes, Motivo)
                          VALUES ('$userID', '$cantidad', '$tasaInteres', '$cuotasTotales', '$cuotasRestantes', '$motivo')";

            if (mysqli_query($conn, $query1)) {
                // Actualizar el saldo del usuario
                $nuevoSaldo = $saldoUsuario + $cantidad;
                $query2 = "UPDATE Cuentas SET Saldo = '$nuevoSaldo' WHERE UsuarioID = '$userID'";

                if (mysqli_query($conn, $query2)) {
                    // Confirmar la transacción
                    mysqli_commit($conn);

                    echo '<script>alert("Préstamo registrado exitosamente.");</script>';
                    echo '<script>window.location.href = window.location.href;</script>';
                } else {
                    // Revertir la transacción en caso de error
                    mysqli_rollback($conn);

                    echo "Error al actualizar el saldo: " . mysqli_error($conn);
                }
            } else {
                echo "Error al registrar el préstamo: " . mysqli_error($conn);
            }
        }
    }
} else {
    // Si 'usuarioID' no está definido en la sesión, manejar el caso según tus necesidades
    echo "Error: 'usuarioID' no está definido en la sesión.";
}

// Función para calcular la tasa de interés según el monto
function calcularTasaInteres($cantidad)
{
    if ($cantidad <= 1000) {
        return 0.03;
    } elseif ($cantidad <= 2000) {
        return 0.05;
    } else {
        return 0.07;
    }
}
?>
