<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/sections_model.php");
    $sectionsModel = new ManageSections();

    if (isset($_POST['nombre_seccion'])) {
        $nombreSeccion = $_POST['nombre_seccion'];
        $idSeccion = $_POST['id_seccion'];
        $sectionsModel->updateSeccion($nombreSeccion, $idSeccion);
        unset($_POST['nombre_seccion']);
    }
}

if (!(isset($_POST['nombre_seccion'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
