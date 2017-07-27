<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/news_model.php");
    $newsModel = new ManageNews();

    if (isset($_POST['subtitulo_noticia'])) {
        $idNoticia = $_POST['id_noticia'];
        $newSubtitulo = $_POST['subtitulo_noticia'];
        $newsModel->updateSubtituloNoticia($idNoticia, $newSubtitulo);
        unset($_POST['subtitulo_noticia']);
    }
}

if (!(isset($_POST['subtitulo_noticia'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
