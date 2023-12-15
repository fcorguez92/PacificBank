<?php
include_once("../../model/conexion.php");
include_once("../../controller/hello.php");

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del usuario desde $_SESSION
    if (isset($_SESSION['usuarioID'])) {
        $userID = $_SESSION['usuarioID'];

        // Obtener los datos actuales del usuario para prellenar los valores que no se han modificado
        $sqlUserData = "SELECT * FROM Usuarios WHERE ID = $userID";
        $resultUserData = mysqli_query($conn, $sqlUserData);

        if ($resultUserData) {
            $row = mysqli_fetch_assoc($resultUserData);

            // Obtener los datos del formulario
            $nuevoNombre = !empty($_POST["nombre"]) ? $_POST["nombre"] : $row["Username"];
            $nuevoEmail = !empty($_POST["email"]) ? $_POST["email"] : $row["Email"];
            $nuevaMoneda = !empty($_POST["moneda"]) ? $_POST["moneda"] : $row["Moneda"];
            $imagenActual = $_POST["imagen_actual"];

            // Procesar la nueva imagen si se ha subido
            if (!empty($_FILES["imagen"]["name"])) {
                $directorioSubida = "../resources/img/";
                $rutaImagenNueva = $directorioSubida . basename($_FILES["imagen"]["name"]);

                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagenNueva)) {
                    // Actualizar la ruta de la imagen
                    $imagenActual = $rutaImagenNueva;
                } else {
                    echo "Error al subir la imagen.";
                    // Puedes manejar el error de otra manera según tus necesidades
                    exit;
                }
            }

            echo "Usuario ID: $userID";
            // Actualizar los campos del usuario en la base de datos
            $sql = "UPDATE Usuarios SET Username = '$nuevoNombre', Email = '$nuevoEmail', ImagenPerfil = '$imagenActual', Moneda = '$nuevaMoneda' WHERE ID = $userID";

            if (mysqli_query($conn, $sql)) {
                echo "Cambios guardados exitosamente.";
            } else {
                echo "Error al guardar los cambios: " . mysqli_error($conn);
            }
        } else {
            echo "Error al obtener los datos actuales del usuario: " . mysqli_error($conn);
        }
    } else {
        echo "Error: 'usuarioID' no está definido en la sesión.";
    }
}
?>
