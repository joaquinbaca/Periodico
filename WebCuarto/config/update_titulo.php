<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/news_model.php");
    $newsModel = new ManageNews();

    if (isset($_POST['titulo_noticia'])) {
        $idNoticia = $_POST['id_noticia'];
        $newTitulo = $_POST['titulo_noticia'];
        $newsModel->updateTituloNoticia($idNoticia, $newTitulo);
        unset($_POST['titulo_noticia']);
    }
}

if (!(isset($_POST['titulo_noticia'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
