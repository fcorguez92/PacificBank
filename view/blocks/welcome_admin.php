<?php include_once("/xampp/htdocs/PacificBank/model/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
    <title>Bienvenido/PacificBank</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../styles/sidebar.css" rel="stylesheet">
    <link href="../styles/hello.css" rel="stylesheet">
</head>

<body>

    <?php include_once("sidebar.php"); ?>

    <header>
        <?php
        include_once("../../controller/hello.php");
        ?>
        <div class="container">
            <div class="message">
                <h1>Bienvenido <?php echo $nombreUsuario; ?></h1>
                <p>Hoy es <?php echo $dateFormatted; ?>.</p>
            </div>
            <h2>Seleccionar Usuario</h2>
            <?php include_once("../../controller/controlPanel.php"); ?>
            <form method="post" action="">
                <label for="usuario_id">Usuario:</label>
                <select id="usuario_id" name="usuario_id" required>
                    <?php
                    while ($row = $resultUsuarios->fetch_assoc()) {
                        echo "<option value='{$row['ID']}'>{$row['Username']}</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="nuevo_email">Nuevo Email:</label>
                <input type="text" id="nuevo_email" name="nuevo_email" required>
                <br>
                <label for="nueva_moneda">Nueva Moneda:</label>
                <input type="text" id="nueva_moneda" name="nueva_moneda" required>
                <br>
                <input type="submit" value="Actualizar Perfil">
            </form>
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