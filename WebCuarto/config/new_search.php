<?php

session_start();

require_once("../model/news_model.php");
$newsModel = new ManageNews();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
    if (isset($_GET['q'])) {
        $q = $_GET['q'];
        $noticias = $newsModel->buscarTitulo($q, 0);
        if ($noticias == "error") {
            echo "Sin resultados";
        } else {
            for ($i = 0; $i < count($noticias); $i++) {
                if (substr_count($_SERVER['HTTP_REFERER'], "view") > 0)
                    $ruta = "news_view.php?id_noticia=" . $noticias[$i]->getIdNoticia();
                else
                    $ruta = "view/news_view.php?id_noticia=" . $noticias[$i]->getIdNoticia();
                echo "<a href='$ruta'>" . $noticias[$i]->getTituloNoticia() . "</a>";
            }
        }
        unset($_GET['q']);
    }
} else {
    if (isset($_GET['q'])) {
        $q = $_GET['q'];
        $noticias = $newsModel->buscarTitulo($q, 1);
        if ($noticias == "error") {
            echo "Sin resultados";
        } else {
            for ($i = 0; $i < count($noticias); $i++) {
                if (substr_count($_SERVER['HTTP_REFERER'], "view") > 0)
                    $ruta = "news_view.php?id_noticia=" . $noticias[$i]->getIdNoticia();
                else
                    $ruta = "view/news_view.php?id_noticia=" . $noticias[$i]->getIdNoticia();
                echo "<a href='view/news_view.php?id_noticia=" . $noticias[$i]->getIdNoticia() . "'>" . $noticias[$i]->getTituloNoticia() . "</a>";
            }
        }
        unset($_GET['q']);
    }
}