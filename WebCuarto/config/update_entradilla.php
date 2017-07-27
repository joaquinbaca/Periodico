<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/news_model.php");
    $newsModel = new ManageNews();

    if (isset($_POST['entradilla_noticia'])) {
        $idNoticia = $_POST['id_noticia'];
        $newEntradilla = $_POST['entradilla_noticia'];
        $newsModel->updateEntradillaNoticia($idNoticia, $newEntradilla);
        unset($_POST['entradilla_noticia']);
    }
}

if (!(isset($_POST['entradilla_noticia'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
