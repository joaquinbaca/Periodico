<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/sections_model.php");
    $sectionsModel = new ManageSections();

    if (isset($_POST['id_seccion'])) {
        $idSeccion = $_POST['id_seccion'];
        $sectionsModel->eraseSeccion($idSeccion);
        unset($_POST['id_seccion']);
    }
}

if (!(isset($_POST['id_seccion'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
