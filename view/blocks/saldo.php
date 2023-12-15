<div class="message">
    <?php
    // Obtener el saldo y la moneda de las variables de sesión
    $saldoConvertido = $_SESSION['saldoConvertido'] ?? 0;
    $moneda = $_SESSION['monedaUsuario'] ?? '';

    echo '<p>Tu saldo actual es de: ' . number_format($saldoConvertido, 2) . ' ' . $moneda . '</p>';
    ?>
</div>