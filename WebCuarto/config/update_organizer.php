<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/news_model.php");
    $newsModel = new ManageNews();

    if (isset($_POST['position'])) {
        $idNoticia = $_POST['id_noticia'];
        $nuevaPosicion = $_POST['position'];
        $newsModel->updatePosicionNoticia($idNoticia, $nuevaPosicion);
        unset($_POST['position']);
    }
}

if (!(isset($_POST['position'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
