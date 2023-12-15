<form action="" method="post">
        <?php
        // Llamar a la función para manejar operaciones de saldo
        $resultOperacion = manejarOperacionSaldo($conn, $nombreUsuario);

        // Mostrar mensajes de error o éxito después de la operación
        if (isset($resultOperacion['error']) && !empty($resultOperacion['error'])) {
            echo '<div class="alert alert-danger" role="alert">' . $resultOperacion['error'] . '</div>';
        } elseif (!empty($resultOperacion)) {
            // Actualizar las variables de sesión después de la operación exitosa
            $_SESSION['saldoConvertido'] = $resultOperacion['saldoConvertido'];
            $_SESSION['monedaUsuario'] = $resultOperacion['moneda'];

            // Puedes mostrar un mensaje de éxito si lo deseas
            echo '<div class="alert alert-success" role="alert">Operación realizada con éxito. Nuevo saldo: ' . $resultOperacion['saldoConvertido'] . ' ' . $resultOperacion['moneda'] . '</div>';
        }
        ?>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" class="form-control" required>
        <button type="submit" name="accion" value="Añadir" class="btn btn-primary mt-3">Añadir</button>
        <button type="submit" name="accion" value="Retirar" class="btn btn-danger mt-3">Retirar</button>
    </form>