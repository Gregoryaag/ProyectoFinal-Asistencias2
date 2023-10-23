<?php
// Establece la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uneweb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>