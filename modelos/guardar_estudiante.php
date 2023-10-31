<?php

if (isset($_POST["estudiante_id"])) {
    $estudiante_id = $_POST["estudiante_id"];
    $nuevo_nombre = $_POST["nuevo_nombre"];
    $nuevo_apellido = $_POST["nuevo_apellido"];
    $nueva_cedula = $_POST["nueva_cedula"];

    // Modificar los datos del estudiante en la base de datos
    $sql = "UPDATE usuarios SET nombre = '$nuevo_nombre', apellido = '$nuevo_apellido', cedula = '$nueva_cedula' WHERE id_usuario = $estudiante_id AND rol = '2' LIMIT 1";
    if ($conn->query($sql) === TRUE) {
        echo "Estudiante modificado exitosamente";
    } else {
        echo "Error al modificar el estudiante, ya raspeme de una maldita vez: " . $conn->error;
    }
}
?>