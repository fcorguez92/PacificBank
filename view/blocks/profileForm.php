<?echo "Usuario ID: $userID";?>


<div class="container mt-4">
    <form method="post" action="" enctype="multipart/form-data">
        <!-- Campo oculto para la ruta de la imagen actual -->
        <input type="hidden" name="imagen_actual" value="<?php echo $rutaImagenPerfil; ?>">

        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nuevo nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Nuevo email:</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="imagen" class="form-label">Nueva Foto:</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="moneda" class="form-label">Moneda:</label>
                    <select id="moneda" name="moneda" class="form-select">
                        <option value='EUR'>EUR</option>
                        <option value='GBP'>GBP</option>
                        <option value='USD'>USD</option>
                        <option value='JPY'>JPY</option>
                        <option value='RUB'>RUB</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <input type="submit" value="Guardar Cambios" class="btn btn-primary">
        </div>
    </form>
</div>

<?php include_once("../../controller/profile.php"); ?>
