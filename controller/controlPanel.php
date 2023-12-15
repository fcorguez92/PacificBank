<?php
include_once("/xampp/htdocs/PacificBank/model/conexion.php");

// Procesar la solicitud de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuario_id'])) {
        $usuarioID = $_POST['usuario_id'];

        // Obtener los datos del formulario
        $nuevoEmail = !empty($_POST["nuevo_email"]) ? $_POST["nuevo_email"] : null;
        $nuevaMoneda = !empty($_POST["nueva_moneda"]) ? $_POST["nueva_moneda"] : null;

        // Procesar la nueva imagen si se ha subido
        if (!empty($_FILES["nueva_imagen"]["name"])) {
            $directorioSubida = "../resources/img/"; // Reemplaza con la ruta correcta
            $rutaImagenNueva = $directorioSubida . basename($_FILES["nueva_imagen"]["name"]);

            if (move_uploaded_file($_FILES["nueva_imagen"]["tmp_name"], $rutaImagenNueva)) {
                // Actualizar la ruta de la imagen en la base de datos
                $updateImagenSql = "UPDATE Usuarios SET ImagenPerfil = '$rutaImagenNueva' WHERE ID = $usuarioID";

            
            } else {
                echo "Error al subir la imagen.";
                exit;
            }
        }

        // Procesar la nueva contraseña si se ha proporcionado
        $nuevaContrasena = !empty($_POST["nueva_contrasena"]) ? password_hash($_POST["nueva_contrasena"], PASSWORD_DEFAULT) : null;

        // Construir la consulta de actualización
        $updateSql = "UPDATE Usuarios SET";

        if ($nuevoEmail !== null) {
            $updateSql .= " Email = '$nuevoEmail',";
        }

        if ($nuevaMoneda !== null) {
            $updateSql .= " Moneda = '$nuevaMoneda',";
        }

        if ($nuevaContrasena !== null) {
            $updateSql .= " Pass = '$nuevaContrasena',";
        }

        // Eliminar la coma adicional al final de la consulta
        $updateSql = rtrim($updateSql, ",");

        // Condición WHERE para identificar al usuario
        $updateSql .= " WHERE ID = $usuarioID";

        // Ejecutar la consulta de actualización
        if ($conn->query($updateSql) === TRUE) {
            echo "Perfil actualizado correctamente.";
        } else {
            echo "Error al actualizar el perfil: " . $conn->error;
        }
    } else {
        echo "Falta el ID de usuario en la solicitud.";
    }
}
?>
