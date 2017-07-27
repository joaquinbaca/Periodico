<?php

session_start();

if (isset($_SESSION['id'])) {

    require_once("../controller/news_controller.php");
    $newsController = new NewsController();

    if (isset($_POST['id_noticia'])) {
        $idNoticia = $_POST['id_noticia'];
        $newsController->eliminarNoticiaPorId($idNoticia);
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
