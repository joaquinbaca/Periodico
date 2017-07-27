<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/ads_model.php");
    $adsModel = new ManageAds();

    if (isset($_POST['nombre_publicidad'])) {
        $idPublicidad = $_POST['id_publicidad'];
        $nombrePublicidad = $_POST['nombre_publicidad'];
        $altPublicidad = $_POST['alt_publicidad'];
        $adsModel->updateAnuncio($idPublicidad, $nombrePublicidad, $altPublicidad);
        unset($_POST['nombre_publicidad']);
    }
}

if (!(isset($_POST['nombre_publicidad'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
