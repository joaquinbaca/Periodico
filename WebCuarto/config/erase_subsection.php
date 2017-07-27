<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/subsections_model.php");
    $subsectionsModel = new ManageSubsections();

    if (isset($_POST['id_subseccion'])) {
        $idSubseccion = $_POST['id_subseccion'];
        $subsectionsModel->eraseSubseccion($idSubseccion);
        unset($_POST['id_subseccion']);
    }
}

if (!(isset($_POST['id_subseccion'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
