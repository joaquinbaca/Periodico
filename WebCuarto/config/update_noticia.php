<?php

session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    require_once("../model/news_model.php");
    $newsModel = new ManageNews();

    if (isset($_POST['imagen_noticia'])) {
        $idNoticia = $_POST['id_noticia'];
        $newImagen = $_POST['imagen_noticia'];
        $newsModel->updateImagenNoticia($idNoticia, $newImagen);
        unset($_POST['imagen_noticia']);
    }
}

if (!(isset($_POST['imagen_noticia'])))
    header("Location: " . $_SERVER['HTTP_REFERER']);
