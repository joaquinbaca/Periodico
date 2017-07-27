<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/news_model.php");
    $newsModel = new ManageNews();

    if (isset($_POST['contenido_noticia'])) {
        $idNoticia = $_POST['id_noticia'];
        $newContenido = $_POST['contenido_noticia'];
        $newsModel->updateContenidoNoticia($idNoticia, $newContenido);
        unset($_POST['contenido_noticia']);
    }
}

if (!(isset($_POST['contenido_noticia'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
