<div class="message">
    <h1>Bienvenido/a <?php echo $nombreUsuario; ?>,</h1>
    <p>Hoy es <?php echo $dateFormatted; ?>.</p>
    <?php
    // Verificar si hay errores antes de mostrar el saldo
    if (isset($result['error']) && !empty($result['error'])) {
        echo '<p>Error al obtener el saldo: ' . $result['error'] . '</p>';
    } else {
        // Mostrar el saldo solo si no hay errores
        $saldoConvertido = $result['saldoConvertido'];
        $moneda = $result['moneda'];
        echo '<p>Tu saldo actual es de: ' . $saldoConvertido . ' ' . $moneda . '</p>';
    }
    ?>