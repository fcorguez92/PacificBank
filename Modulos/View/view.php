<!DOCTYPE html>
<html>
    <head>
        <title>Registro de Usuario</title>
    </head>
    <body>
        <h2>Registro de Usuario</h2>
        <form action="../Controller/register.php" method="post">
            Nombre de usuario:<br>
            <input type="text" name="nombre"><br>
            Contraseña:<br>
            <input type="password" name="contraseña"><br>
            Saldo inicial:<br>
            <input type="text" name="saldo"><br><br>
            <input type="submit" value="Registrarse">
        </form>
</body>
</html>

