<!doctype html>
<html lang="en">

<head>

    <title>LogIn/PacificBank</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="view/styles/style.css" rel="stylesheet">
    <link href="view/styles/login.css" rel="stylesheet">

</head>

<body>
    <header>
    
    </header>
    <main>

    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Iniciar sesión</h2>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario:</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                <input type="submit" class="btn btn-primary" value="Iniciar sesión">
                            </div>

                            <div class="text-center">
                                <p class="mb-0">¿No tienes cuenta? <a href="view/blocks/register.php">Regístrate</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</main>
    <footer>
    
    
    </footer>
    
    <script src="view/js/passview.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>