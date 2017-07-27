<?php

$enGestion = false;
if (substr_count($_SERVER['PHP_SELF'], "ads") > 0)
    $enGestion = true;

if (file_exists("controller/ads_controller.php"))
    include_once("controller/ads_controller.php");
else
    include_once("../controller/ads_controller.php");

$adsController= new AdsController();

if (isset($_GET['id_noticia'])) {    // anuncios de las noticias
    if ($enGestion)
        $adsController->anunciosNoticiaGestion();
    else
        $adsController->anunciosNoticia();
} else {    // anuncios de la portada
    if ($enGestion)
        $adsController->anunciosPortadaGestion();
    else
        $adsController->anunciosPortada();
}



