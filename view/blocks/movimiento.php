<form action="" method="post">
    <?php
    // Llamar a la función para manejar operaciones de saldo
    $resultOperacion = manejarOperacionSaldo($conn, $nombreUsuario);

    // Mostrar mensajes de error o éxito después de la operación
    if (isset($resultOperacion['error']) && !empty($resultOperacion['error'])) {
        echo '<p>Error: ' . $resultOperacion['error'] . '</p>';
    } elseif (!empty($resultOperacion)) {
        echo '<p>Operación realizada con éxito. Nuevo saldo: ' . $resultOperacion['saldoConvertido'] . ' ' . $resultOperacion['moneda'] . '</p>';
    }
    ?>
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required>
    <input type="submit" name="accion" value="Añadir">
    <input type="submit" name="accion" value="Retirar">
</form>