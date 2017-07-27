<?php
session_start();

require_once("conexion.php");
$conexion = connectDB();

$mail = addslashes($_POST['mail']);
$password = addslashes($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE correo_usuario = '$mail' and clave_usuario = '$password'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['loggedin'] = true;
    $_SESSION['user_rol'] = $row['rol_usuario'];
    $_SESSION['id'] = $row['id_usuario'];
    $_SESSION['mail'] = $row['correo_usuario'];
    $_SESSION['username'] = $row['nombre_usuario'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "<p>¡Bienvenido " . $row['nombre_usuario'] . "!</p>";
    echo "<a href='" . $_SERVER['HTTP_REFERER'] . "'>Pulse aquí para regresar</a>";
} else {
    echo "<p>Ocurrió un fallo en la autentificación.</p>";
    echo "<a href='" . $_SERVER['HTTP_REFERER'] . "'>Pulse aquí para regresar</a>";
}

$conexion->close();
