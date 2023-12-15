<?php
include_once("../../model/conexion.php");
include_once("../../controller/saldo.php");                
include_once("../../controller/hello.php");
// Verificar si 'usuarioID' está definido en la sesión
if (isset($_SESSION['usuarioID'])) {
    // Obtener el valor de 'usuarioID' desde la sesión
    $usuarioID = $_SESSION['usuarioID'];
    $monedaUsuario = $_SESSION['monedaUsuario'];
    // Consultar préstamos del usuario
    $query = "SELECT Monto, TasaInteres, CuotasTotales, CuotasRestantes, Motivo FROM Prestamos WHERE UsuarioID = $usuarioID";
    $result = mysqli_query($conn, $query);

    // Inicializar una variable para determinar si hay préstamos
    $hayPrestamos = false;

    if ($result) {
        // Verificar si hay préstamos
        if (mysqli_num_rows($result) > 0) {
            // Indicar que hay préstamos
            $hayPrestamos = true;
        }
    } else {
        // Imprimir mensaje de error en caso de fallo en la consulta
        echo "Error al consultar los préstamos: " . mysqli_error($conn);
    }
} else {
    // Si 'usuarioID' no está definido en la sesión, manejar el caso según tus necesidades
    echo "Error: 'usuarioID' no está definido en la sesión.";
}

// Mostrar la tabla HTML
echo '<table border=1 class="table">
        <thead>
            <tr>
                <th>Monto</th>
                <th>Tasa de Interés</th>
                <th>Cuotas Totales</th>
                <th>Cuotas Pagadas</th>
                <th>Cuotas Restantes</th>
                <th>Motivo</th>
            </tr>
        </thead>
        <tbody>';

if ($hayPrestamos) {
    // Mostrar los préstamos si los hay
    
    while ($row = mysqli_fetch_assoc($result)) {
        // Convertir el monto a la moneda del usuario
        switch ($monedaUsuario) {
            case 'USD':
                $montoConvertido = $row['Monto'] * 1.1; // 1 euro = 1.1 dólares
                break;
            case 'GBP':
                $montoConvertido = $row['Monto'] * 0.9; // 1 euro = 0.9 libras
                break;
            case 'JPY':
                $montoConvertido = $row['Monto'] * 160; // 1 euro = 160 yenes
                break;
            case 'RUB':
                $montoConvertido = $row['Monto'] * 0.95; // 1 euro = 95 rublos
                break;
            default:
                $montoConvertido = $row['Monto']; // Moneda predeterminada: euros
        }

        echo '<tr>
        <td>' . number_format($montoConvertido, 2) .' '.$monedaUsuario. '</td>
                <td>' . $row['TasaInteres'] . '</td>
                <td>' . $row['CuotasTotales'] . '</td>
                <td>' . ($row['CuotasTotales'] - $row['CuotasRestantes']) . '</td>
                <td>' . $row['CuotasRestantes'] . '</td>
                <td>' . $row['Motivo'] . '</td>
            </tr>';
    }
} else {
    // Mostrar mensaje cuando no hay préstamos
    echo '<tr><td colspan="6">No hay préstamos registrados.</td></tr>';
}

echo '</tbody></table>';
?>
