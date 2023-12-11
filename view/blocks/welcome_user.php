<?php include_once("/xampp/htdocs/PacificBank/model/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
    <title>Bienvenido/PacificBank</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../styles/sidebar.css" rel="stylesheet">
    <link href="../styles/hello.css" rel="stulesheet">
    <link href="../styles/profile_img.css" rel="stylesheet">

</head>

<body>

    <?php include_once("sidebar.php"); ?>

    <header>
        <?php
        include_once("../../controller/hello.php");
        include_once("../../controller/img.php");
        include_once("../../controller/saldo.php");
        $result = obtenerSaldoConvertido($conn, $nombreUsuario);
        ?>
        <div class="container">
            <div class="message">
                <h1>Bienvenido <?php echo $nombreUsuario; ?>,</h1>
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

                <!--Formulario de movimientos-->
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
            </div>
        </div>

    </header>
    <main>

    </main>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>