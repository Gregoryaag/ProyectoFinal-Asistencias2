<?php
require("../modelos/conexion.php");

// Generar número aleatorio de 4 dígitos
$numeroAleatorio = rand(1000, 9999);

// Formatear el número para asegurarse de que tenga 4 dígitos
$numeroFormateado = str_pad($numeroAleatorio, 4, '0', STR_PAD_LEFT);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $rol = $_POST["rol"];
    
    if (isset($_POST["inscripcion-modalidad"])){
        $modalidad = $_POST["inscripcion-modalidad"];
    }
    if (isset($_POST["inscripcion"])){
        $modalidad = $_POST["inscripcion"];
    }
    $categoria = $_POST["categoria"];
    $curso = $_POST["cursos"];
    $diplomado = $_POST["diplomados"];
    $turno = $_POST["turno"];
    $profesor = $_POST["profesorAsignado"];
    $id_usuario = $_POST["idUsuario"];

      // Establecer el valor predeterminado para la columna "status" como "activo" (1)
    $status = 1;

    // Insertar los datos en la tabla usuarios con el valor predeterminado de "status"
    $sql = "INSERT INTO usuarios (nombre, apellido, cedula, fecha_nacimiento, rol, id_sesion, status) VALUES ('$nombre', '$apellido', '$cedula', '$fechaNacimiento','$rol', '$id_usuario', '$status');";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registro de usuario exitoso');</script>";
    } else {
        echo "<script>alert('Error al Registrar el Usario');</script> " . $conn->error;
    }
}

// Obtener los usuarios con el rol de profesor (rol número 3)
$sqlProfesores = "SELECT id_usuario, nombre, apellido FROM usuarios WHERE rol = 3";
$result = $conn->query($sqlProfesores);

// Crear un array para almacenar los profesores y sus identificadores desde la base de datos
$profesoresArray = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profesoresArray[] = array(
            'id_usuario' => $row["id_usuario"],
            'nombre' => $row["nombre"],
            'apellido' => $row["apellido"]
        );
    }
}

// Crea un array para almacenar los roles y sus identificadores desde la base de datos
$rolesArray = array();

if (count(array($result)) > 0) {
  while ($row = $result->fetch_assoc()) {
    $rolesArray[] = array(
      'id_rol' => $row["id_rol"],
      'roles' => $row["roles"]
    );
  }
}

$sqlroles = "SELECT * FROM roles;";
$roles = $conn->query($sqlroles);

// Realiza una consulta a la base de datos para obtener las categorias
$sql = "SELECT id_categoria, nombre_categoria FROM categorias";
$result = $conn->query($sql);

// Crea un array para almacenar las categorias y sus identificadores desde la base de datos
$categoriasArray = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $categoriasArray[] = array(
      'id_categoria' => $row["id_categoria"],
      'nombre_categoria' => $row["nombre_categoria"]
    );
  }
}
$sqlcategorias = "SELECT * FROM categorias;";
$categorias = $conn->query($sqlcategorias);

// Realiza una consulta a la base de datos para obtener los diplomados
$sql = "SELECT id_diplomado, nombre_diplomado FROM diplomados";
$result = $conn->query($sql);

// Crea un array para almacenar los diplomados y sus identificadores desde la base de datos
$diplomadosArray = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $diplomadosArray[] = array(
      'id_diplomado' => $row["id_diplomado"],
      'nombre_diplomado' => $row["nombre_diplomado"]
    );
  }
}
$sqldiplomados = "SELECT * FROM diplomados;";
$diplomados = $conn->query($sqldiplomados);


// Realiza una consulta a la base de datos para obtener los cursos
$sql = "SELECT id_curso, nombre_curso FROM cursos";
$result = $conn->query($sql);

// Crea un array para almacenarlos cursos y sus identificadores desde la base de datos
$cursosArray = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $cursosArray[] = array(
      'id_curso' => $row["id_curso"],
      'nombre_curso' => $row["nombre_curso"]
    );
  }
}

$sqlcursos = "SELECT * FROM cursos;";
$cursos = $conn->query($sqlcursos);


// Realiza una consulta a la base de datos para obtener los turnos
$sql = "SELECT * FROM turnos";
$result = $conn->query($sql);

// Crea un array para almacenar los turnos y sus identificadores desde la base de datos
$turnosArray = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $turnosArray[] = array(
      'id_turnos' => $row["id_turnos"],
      'turnos' => $row["turnos"]
    );
  }
}

$sqlturnos = "SELECT * FROM turnos;";
$turnos = $conn->query($sqlturnos);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/stylesindex.css">
</head>

<body>
    <div class="container-principal">
        <div class="lateral">
            <div class="lateral-header">
                <div class="icono">
                    <img id="logo" src="/img/logo-uneweb.png" alt="">
                </div>
            </div>
            <ul class="lateral-list">
                <li class="lateral-list-item">
                    <a href="/index.php" id="inicio">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                        </svg>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="lateral-list-item">
                    <a href="#" id="usuarios-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <span>Usuarios</span>
                    </a>
                    <ul class="drop-menu">
                        <li><a href="/paginas/register-user.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                    <path
                                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path
                                        d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                </svg>
                                <span>Registrar Usuario</span>
                            </a></li>
                        <li><a href="/paginas/students.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                                <span>Estudiantes</span>
                            </a></li>
                        <li><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-person-video3" viewBox="0 0 16 16">
                                    <path
                                        d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z" />
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z" />
                                </svg>
                                <span>Profesores</span></a></li>
                    </ul>
                </li>
                <li class="lateral-list-item">
                    <a href="#" id="cursos-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-pc-display" viewBox="0 0 16 16">
                            <path
                                d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V1Zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0ZM9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5ZM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5ZM1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2H1.5Z" />
                        </svg>
                        <span>Cursos</span>
                    </a>
                    <ul class="drop-menu-cursos">
                        <li><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z" />
                                </svg>
                                <span>Registrar Cursos</span>
                            </a></li>
                        <li><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z" />
                                </svg>
                                <span>Registrar Diplomados</span>
                            </a></li>
                        <li><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-clipboard2-plus-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                    <path
                                        d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM8.5 6.5V8H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V9H6a.5.5 0 0 1 0-1h1.5V6.5a.5.5 0 0 1 1 0Z" />
                                </svg>
                                <span>Registrar Categorias</span>
                            </a></li>
                        <li><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                    <path
                                        d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z" />
                                </svg>
                                <span>Cursos</span>
                            </a></li>
                        <li><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                    <path
                                        d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z" />
                                </svg>
                                <span>Diplomados</span></a></li>
                    </ul>
                </li>
                <li class="lateral-list-item">
                    <a href="#" id="reportes-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-journal-text" viewBox="0 0 16 16">
                            <path
                                d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            <path
                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path
                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg>
                        <span>Reportes</span>
                    </a>
                    <ul class="drop-menu-reportes">
                        <li><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                                <span>Estudiantes</span>
                            </a></li>
                        <li><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-person-video3" viewBox="0 0 16 16">
                                    <path
                                        d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z" />
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z" />
                                </svg>
                                <span>Profesores</span></a></li>
                    </ul>
                </li>
            </ul>
            <div class="position-absolute">
                <div class="cuenta-info">
                    <div class="cuenta-imagen">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" fill="white"
                            class="bi bi-person-vcard" viewBox="0 0 16 16">
                            <path
                                d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                            <path
                                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                        </svg>
                    </div>
                    <div class="cuenta-nombre"><span class="nombre-sesion">Gregory</span></div>
                    <label class="switch-cerrar-sesion">
                        <div id="mensajeCerrarSesion" class="hidden">¿Estás seguro de que deseas cerrar la sesión?</div>
                        <input type="checkbox" id="cerrarSesion">
                        <span class="slider-cerrar-sesion"><a href="/paginas/login-admin.php"></a></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="container-barra">
            <div class="container-header">
                <h1 class="header-text">Registrar Usuario</h1>
            </div>
            <div class="container-formulario">
                <div class="container-formulario-registro">
                    <form action="register-user.php" class="formulario-registro" method="POST">
                        <div class="flex">

                            <div class="column">
                                <label for="nombre" class="label-form"><span class="text-form">Nombre</span></label>
                                <input class="block-style" id="identificacion" type="text" name="nombre"
                                    placeholder="Gregory" title="Introduzca el Nombre" required>
                            </div>

                            <div class="column">
                                <label for="apellido" class="label-form"><span class="text-form">Apellido</span></label>
                                <input class="block-style" id="identificacion" type="text" name="apellido"
                                    placeholder="Arteaga" title="Introduzca el Apellido" required>
                            </div>
                            <div class="column">
                                <label for="cedula" class="label-form"><span class="text-form">C.I</span></label>
                                <input class="block-style" id="identificacion" type="text" name="cedula"
                                    placeholder="24210544" title="Introduzca la Cedula" required>
                            </div>
                            <div class="column">
                                <label for="fechaNacimiento" class="label-form"><span class="text-form">F.
                                        Nacimiento</span></label>
                                <input class="block-style" type="date" id="fechaNacimiento" name="fechaNacimiento">
                            </div>

                        </div>

                        <div id="rol-container">
                            <div class="block-selects">
                                <div class="ancholabel-rol">
                                    <label for="rol" class="label-form"><span class="text-form">Rol:</span></label>
                                </div>
                                <div>
                                    <select class="block-style form-select" id="rol" name="rol">
                                        <option value="">Seleccione el Rol</option>
                                        <?php
    foreach ($roles as $rol) {
      echo '<option value="' . $rol['id_rol'] . '">' . $rol['roles'] . '</option>';
    }
  ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="container-inscripcion" id="select-modalidad-container">
                            <label for="inscripcion-modalidad" class="label-form"><span
                                    class="text-form">Modalidad:</span></label>
                            <input type="radio" name="inscripcion-modalidad" value="presencial" id="presencial"><span
                                class="text-select-diplomado">Presencial</span>
                            <input type="radio" name="inscripcion-modalidad" value="online" id="online"><span
                                class="text-select-curso">Online</span>
                        </div>

                        <div class="container-inscripcion" id="select-inscripcion-container">
                            <label for="categoria" class="label-form"><span class="text-form">Tipo de
                                    Inscripción:</span></label>
                            <input type="radio" name="inscripcion" value="diplomado" id="diplomado"><span
                                class="text-select-diplomado">Diplomado</span>
                            <input type="radio" name="inscripcion" value="curso" id="curso"><span
                                class="text-select-curso">Curso</span>
                        </div>


                        <div id="categoria-container">
                            <div class="select-register-categoria block-selects">
                                <div class="ancholabel">
                                    <label for="categoria" class="label-form"><span
                                            class="text-form">Categoria:</span></label>
                                </div>
                                <div>
                                    <select class="block-style form-select" id="categoria-estudiante" name="categoria"
                                        required>
                                        <option selected>Seleccione una Categoria</option>
                                        <?php
    foreach ($categorias as $categoria) {
      echo '<option value="' . $categoria['id_categoria'] . '">' . $categoria['nombre_categoria'] . '</option>';
    }
  ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div id="curso-container">
                            <div class="select-register-curso block-selects">
                                <div class="ancholabel">
                                    <label for="cursos" class="label-form"><span class="text-form">Curso:</span></label>
                                </div>
                                <div>
                                    <select class="block-style form-select" id="curso-estudiante" name="cursos"
                                        required>
                                        <option selected>Seleccione un Curso</option>
                                        <?php
    foreach ($cursos as $curso) {
      echo '<option value="' . $curso['id_curso'] . '">' . $curso['nombre_curso'] . '</option>';
    }
  ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="diplomado-container">
                            <div class="select-register-diplomado block-selects">
                                <div class="ancholabel">
                                    <label for="diplomados" class="label-form"><span
                                            class="text-form">Diplomado:</span></label>
                                </div>
                                <div>
                                    <select class="block-style form-select" id="diplomado-estudiante" name="diplomados"
                                        required>
                                        <option selected>Seleccione un Diplomado</option>
                                        <?php
    foreach ($diplomados as $diplomado) {
      echo '<option value="' . $diplomado['id_diplomado'] . '">' . $diplomado['nombre_diplomado'] . '</option>';
    }
  ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div id="turno-container">
                            <div class="select-register-turno block-selects">
                                <div class="ancholabel">
                                    <label for="turno" class="label-form"><span class="text-form">Turno:</span></label>
                                </div>
                                <div>
                                    <select class="block-style form-select" id="turno" name="turno" required>
                                        <option selected>Seleccione un Turno</option>
                                        <?php
    foreach ($turnos as $turno) {
      echo '<option value="' . $turno['id_turnos'] . '">' . $turno['turnos'] . '</option>';
    }
  ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div id="profesor-container">
                            <div class="select-register-profesor block-selects">
                                <div class="ancholabel">
                                    <label for="profesorAsignado" class="label-form"><span
                                            class="text-form">Profesor:</span></label>
                                </div>
                                <div>
                                    <select class="block-style form-select" id="profesorAsignado"
                                        name="profesorAsignado">
                                        <option selected>Seleccione un Profesor</option>
                                        <?php foreach ($profesoresArray as $profesor) { ?>
                <option value="<?php echo $profesor['id_usuario']; ?>">
                    <?php echo $profesor['nombre'] . ' ' . $profesor['apellido']; ?>
                </option>
            <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                       <!---- <div class="status-user">
                            <div class="switch-container">
                                <span class=" etiqueta-estatus text-form label-form">Status:</span>
                                <label class="switch">
                                    <input type="checkbox" id="estadoSwitch">
                                    <span class="slider"></span>
                                    <span class="etiqueta-on" id="activo"></span>
                                    <span class="etiqueta-off" id="inactivo"></span>
                                </label>
                            </div>
                        </div> ---->


                        <div class="block">
                            <div class="block-boton">
                            <input for="idSesion" class="id-generar" type="text" name="idUsuario" value="<?php echo $numeroFormateado; ?>" readonly>
                            
                            </div>
                        </div>
                        <div class="block">
                            <div class="formulario-registrar">
                                <button type="submit" name="registrar" class="registrar-user" id="registerUser"><span
                                        class="text-register">Registrar</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/script.js"></script>
</body>

</html>