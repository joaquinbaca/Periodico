<?php

session_start();

if (isset($_SESSION['id'])) {

    require_once("../controller//news_controller.php");
    $newsController = new NewsController();


    $idUsuario = $_SESSION['id'];
    $tituloNoticia = $_POST['titulo_noticia'];
    $subtituloNoticia = $_POST['subtitulo_noticia'];
    $entradillaNoticia= $_POST['entradilla_noticia'];
    $contenidoNoticia = $_POST['contenido_noticia'];
    $imagenNoticia = $_POST['imagen_noticia'];
    $autorImagen = $_POST['autor_imagen'];


    $newsController->nuevaNoticia($tituloNoticia, $subtituloNoticia,$entradillaNoticia ,$contenidoNoticia, $imagenNoticia ,$autorImagen);



}





