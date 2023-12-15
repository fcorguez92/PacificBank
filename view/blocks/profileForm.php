<?echo "Usuario ID: $userID";?>
<form method="post" action="" enctype="multipart/form-data">
    <!-- Campo oculto para la ruta de la imagen actual -->
    <input type="hidden" name="imagen_actual" value="<?php echo $rutaImagenPerfil; ?>">

    <label for="nombre">Nuevo nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="email">Nuevo email:</label>
    <input type="email" id="email" name="email">
    <br>
    <label for="imagen">Nueva Foto:</label>
    <input type="file" id="imagen" name="imagen">
    <br>
    <label for="moneda">Moneda:</label>
    <select id="moneda" name="moneda">
    <option value='EUR'>EUR</option>
    <option value='GBP'>GBP</option>
    <option value='USD'>USD</option>
    <option value='JPY'>JPY</option>
    <option value='RUB'>RUB</option>
    </select>

    <input type="submit" value="Guardar Cambios">
</form>
<?php include_once("../../controller/profile.php");?>