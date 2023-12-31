<?php
include_once("../../model/conexion.php");
// include_once("/xampp/htdocs/PacificBank/controller/prestamo.php");
include_once("../../controller/saldo.php");
include_once("../../controller/hello.php");
?>
<!doctype html>
<html lang="es">

<head>
    <title>Bienvenido/PacificBank</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../styles/sidebar.css" rel="stylesheet">
    <link href="../styles/hello.css" rel="stylesheet">
    <link href="../styles/profile_img.css" rel="stylesheet">

</head>

<body>

    <?php include_once("sidebar.php"); ?>

    <header>
        <?php

        include_once("../../controller/img.php");

        ?>
        <div class="container">
            <?php include_once("hello.php") ?>
        
            
        </div>
    </header>
    <main>
        <div class="container">
        <h2>Préstamos pendientes</h2>
        <?php include_once("listaPrestamo.php"); ?>
        </div>
    </main>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>