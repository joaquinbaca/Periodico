<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/ads_model.php");
    $adsModel = new ManageAds();

    if (isset($_POST['id_publicidad'])) {
        $idPublicidad = $_POST['id_publicidad'];
        $adsModel->eraseAnuncio($idPublicidad);
        unset($_POST['id_publicidad']);
    }
}

if (!(isset($_POST['id_publicidad'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
