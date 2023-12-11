<?php

include_once("/xampp/htdocs/PacificBank/model/conexion.php");

    // Obtener la ruta de la imagen de perfil del usuario
    $sql = "SELECT ImagenPerfil FROM Usuarios WHERE Username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rutaImagenPerfil = $row["ImagenPerfil"];

        // Verificar si la ruta de la imagen es válida
        if (file_exists($rutaImagenPerfil)) {
            // Mostrar la imagen de perfil
            echo '<div class="profile-image">';
            echo "<img src='$rutaImagenPerfil' alt='Imagen de perfil'>";
            echo '</div>';
        } else {
            // Mostrar la imagen de relleno (placeholder)
            echo '<div class="profile-image">';
            echo "<img src='../../view/resources/img/placeholder.jpg' alt='Imagen de perfil por defecto'>";
            echo '</div>';
        }
    } else {
        // Mostrar la imagen de relleno (placeholder) si no hay resultado en la consulta
        echo '<div class="profile-image">';
        echo "<img src='../../view/resources/img/placeholder.jpg' alt='Imagen de perfil por defecto'>";
        echo '</div>';
    }
?>