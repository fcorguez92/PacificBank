<?php
include_once("../../model/conexion.php");

// Verificar si 'usuarioID' está definido en la sesión
if (isset($_SESSION['usuarioID'])) {
    // Obtener el valor de 'usuarioID' desde la sesión
    $usuarioID = $_SESSION['usuarioID'];

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
echo '<h2>Préstamos</h2>
      <table border=1 class="table">
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
        echo '<tr>
                <td>' . $row['Monto'] . '</td>
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
