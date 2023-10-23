<?php
// Obtener el ID enviado por la solicitud AJAX
$idSesion = $_POST["id_sesion"];

// Realizar la conexión a la base de datos y ejecutar la consulta para guardar el ID
// Asegúrate de ajustar el código según tu configuración de conexión y consulta

$conn = new mysqli("localhost", "root", "", "uneweb");
$sql = "INSERT INTO usuarios (id_sesion) VALUES ('$idSesion')";
$conn->query($sql);

$conn->close();
?>