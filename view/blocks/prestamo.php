<div class="container">
            <h2>Prestamos</h2>
                    <!-- Formulario de movimientos -->
<form action="" method="post">
    <?php
    // Mostrar mensajes de error o éxito después de la operación
    if (isset($errorPrestamo) && !empty($errorPrestamo)) {
        echo '<p>Error al solicitar préstamo: ' . $errorPrestamo . '</p>';
    } elseif (isset($exitoPrestamo) && !empty($exitoPrestamo)) {
        echo '<p>' . $exitoPrestamo . '</p>';
    }
    ?>
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required>
    <label for="motivo">Motivo:</label>
    <input type="text" name="motivo" required>
    <input type="submit" name="action" value="Solicitar">
</form>

        </div>