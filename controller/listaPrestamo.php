<?php

$usuarioID = 1; // ID del usuario logeado (puedes cambiar esto según tu implementación de inicio de sesión)

// Consultar préstamos del usuario
$query = "SELECT * FROM Prestamos WHERE UsuarioID = $usuarioID";
$result = mysqli_query($conn, $query);

if ($result) {
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

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row['Monto'] . '</td>
                <td>' . $row['TasaInteres'] . '</td>
                <td>' . $row['CuotasTotales'] . '</td>
                <td>' . ($row['CuotasTotales'] - $row['CuotasRestantes']) . '</td>
                <td>' . $row['CuotasRestantes'] . '</td>
                <td>' . $row['Motivo'] . '</td>
            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo "Error al consultar los préstamos.";
}

mysqli_close($conn);
?>
