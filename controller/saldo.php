<?php
function obtenerSaldoConvertido($conn, $username) {
    $result = array();

    // Obtener la moneda preferida del usuario
    $sqlMoneda = "SELECT Moneda FROM Usuarios WHERE Username = '$username'";
    $resultMoneda = $conn->query($sqlMoneda);

    if ($resultMoneda->num_rows > 0) {
        $rowMoneda = $resultMoneda->fetch_assoc();
        $monedaUsuario = $rowMoneda["Moneda"];

        // Inicializar las variables
        $saldoUsuario = 0;

        // Obtener el saldo del usuario en euros (moneda base)
        $sqlSaldo = "SELECT Saldo FROM Cuentas 
                     JOIN Usuarios ON Cuentas.UsuarioID = Usuarios.ID 
                     WHERE Usuarios.Username = '$username'";
        $resultSaldo = $conn->query($sqlSaldo);

        if ($resultSaldo->num_rows > 0) {
            $rowSaldo = $resultSaldo->fetch_assoc();
            $saldoUsuario = $rowSaldo["Saldo"];

            // Convertir el saldo a la moneda seleccionada
            switch ($monedaUsuario) {
                case 'USD':
                    $saldoConvertido = $saldoUsuario * 1.1; // 1 euro = 1.1 dólares
                    break;
                case 'GBP':
                    $saldoConvertido = $saldoUsuario * 0.9; // 1 euro = 0.9 libras
                    break;
                case 'JPY':
                    $saldoConvertido = $saldoUsuario / 160; // 1 euro = 160 yenes
                    break;
                case 'RUB':
                    $saldoConvertido = $saldoUsuario / 95; // 1 euro = 95 rublos
                    break;
                default:
                    $saldoConvertido = $saldoUsuario; // Moneda predeterminada: euros
            }

            // Redondear el saldo convertido a 2 decimales
            $saldoConvertido = round($saldoConvertido, 2);

        } else {
            // Manejar el caso donde no se pudo obtener el saldo
            $result['error'] = 'No se pudo obtener el saldo del usuario.';
        }

        // Devolver el saldo y la moneda en un arreglo
        $result['saldoConvertido'] = $saldoConvertido;
        $result['moneda'] = $monedaUsuario;
    } else {
        // Manejar el caso donde no se pudo obtener la moneda
        $result['error'] = 'No se pudo obtener la moneda del usuario.';
    }

    return $result;
}

function manejarOperacionSaldo($conn, $username) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["accion"]) && ($_POST["accion"] == "Añadir" || $_POST["accion"] == "Retirar")) {
            $cantidad = $_POST["cantidad"];
            $accion = $_POST["accion"];

            // Validar la cantidad (puedes agregar más validaciones según tus necesidades)
            if (!is_numeric($cantidad) || $cantidad <= 0) {
                return ['error' => 'La cantidad ingresada no es válida.'];
            }

            // Obtener el saldo actual
            $result = obtenerSaldoConvertido($conn, $username);

            if (isset($result['error']) && !empty($result['error'])) {
                return $result;
            }

            $saldoActual = $result['saldoConvertido'];

            // Realizar la operación correspondiente
            if ($accion == "Añadir") {
                $nuevoSaldo = $saldoActual + $cantidad;
            } else { // $accion == "Retirar"
                // Verificar si hay suficiente saldo
                if ($cantidad > $saldoActual) {
                    return ['error' => 'No tienes suficiente saldo para retirar esa cantidad.'];
                }
                $nuevoSaldo = $saldoActual - $cantidad;
            }

            // Actualizar el saldo en la base de datos
            $sqlUpdate = "UPDATE Cuentas
                          JOIN Usuarios ON Cuentas.UsuarioID = Usuarios.ID 
                          SET Saldo = $nuevoSaldo
                          WHERE Usuarios.Username = '$username'";

            if ($conn->query($sqlUpdate) === TRUE) {
                // Actualizar el saldo convertido después de la operación
                return obtenerSaldoConvertido($conn, $username);
            } else {
                return ['error' => 'Error al actualizar el saldo.'];
            }
        }
    }

    return [];
}
?>
