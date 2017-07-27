<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/subsections_model.php");
    $subsectionsModel = new ManageSubsections();

    if (isset($_POST['nombre_subseccion'])) {
        $nombreSubseccion = $_POST['nombre_subseccion'];
        $idSeccion = $_POST['id_seccion'];
        $subsectionsModel->addSubseccion($nombreSubseccion, $idSeccion);
        unset($_POST['nombre_subseccion']);
    }
}

if (!(isset($_POST['nombre_subseccion'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
