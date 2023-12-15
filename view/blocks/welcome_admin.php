<?php include_once("/xampp/htdocs/PacificBank/model/conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Usuario/PacificBank</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../styles/sidebar.css" rel="stylesheet">
    <link href="../styles/hello.css" rel="stylesheet">
</head>

<body class="bg-light">
    <header>
        <?php include_once("../../controller/hello.php"); ?>
        <div class="container custom-container">
            <div class="message">
                <h1 class="mt-4">Bienvenido <?php echo $nombreUsuario; ?></h1>
                <p>Hoy es <?php echo $dateFormatted; ?>.</p>
            </div>
            <form method="post" action="" class="mt-4">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Seleccionar Usuario</h2>
                                <?php include_once("../../controller/controlPanel.php"); ?>
                                <label for="usuario_id" class="form-label">Seleccionar Usuario:</label>
                                <select id="usuario_id" name="usuario_id" class="form-select" required>
                                    <?php
                                    $sqlUsuarios = "SELECT ID, Username FROM Usuarios WHERE UserType = 'Normal'";
                                    $resultUsuarios = $conn->query($sqlUsuarios);

                                    while ($row = $resultUsuarios->fetch_assoc()) {
                                        echo "<option value='{$row['ID']}'>{$row['Username']}</option>";
                                    }
                                    ?>
                                </select>
                                <label for="nuevo_email" class="form-label mt-3">Nuevo Email:</label>
                                <input type="email" id="nuevo_email" name="nuevo_email" class="form-control">
                                <label for="nueva_moneda" class="form-label mt-3">Nueva Moneda:</label>
                                <select id="nueva_moneda" name="nueva_moneda" class="form-select">
                                    <option value='EUR'>EUR</option>
                                    <option value='GBP'>GBP</option>
                                    <option value='USD'>USD</option>
                                    <option value='JPY'>JPY</option>
                                    <option value='RUB'>RUB</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Opciones Adicionales</h2>
                                <label for="nueva_imagen" class="form-label">Nueva Imagen:</label>
                                <input type="file" id="nueva_imagen" name="nueva_imagen" class="form-control">
                                <label for="nueva_contrasena" class="form-label mt-3">Nueva Contraseña:</label>
                                <input type="password" id="nueva_contrasena" name="nueva_contrasena" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Actualizar Perfil</button>
            </form>
            <div class="mt-3">
                <a href="/PacificBank" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <main>
    </main>

    <footer>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
