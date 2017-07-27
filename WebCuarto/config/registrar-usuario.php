<?php

require_once("conexion.php");

$conexion = connectDB();

$form_name = addslashes($_POST['username']);
$form_pass = addslashes($_POST['password']);
$form_correo = addslashes($_POST['correo']);

$buscarUsuario = "SELECT * FROM usuarios WHERE correo_usuario = '$form_correo'";
$result = $conexion->query($buscarUsuario);

if ($result->num_rows > 0) {
    echo "<br>El usuario ya existe.<br>";
    echo "<a href='../index.php'>Por favor escoga otro Nombre</a>";
} else {
    $query = "INSERT INTO Usuarios (nombre_usuario, clave_usuario, correo_usuario)
           VALUES ('$form_name', '$form_pass','$form_correo')";

    if ($conexion->query($query) === TRUE) {
        echo "<h2>Usuario Creado Exitosamente!</h2>";
        echo "<h4>Bienvenido: " . $form_name . "</h4>";
        echo "<h5>Hacer Login: <a href='../index.php'>Login</a></h5>";
    } else {
        echo "Error al crear el usuario: " . $conexion->error ;
    }
}
