<h2>Prestamos</h2>
<!-- Formulario de movimientos -->
<form action="" method="post">
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required>
    <label for="motivo">Motivo:</label>
    <input type="text" name="motivo" required>
    <input type="submit" name="action" value="Solicitar">
</form>

<?php
include_once("../../controller/prestamo.php");
?>