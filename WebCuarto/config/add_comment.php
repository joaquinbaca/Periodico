<?php

session_start();

if (isset($_SESSION['id'])) {

    require_once("../controller/comments_controller.php");
    $commentsController = new CommentsController();

    if (isset($_POST['mensajeComentario'])) {
        $idUsuario = $_SESSION['id'];
        $idNoticia = $_GET['id_noticia'];
        $direccionIP = $_SERVER['REMOTE_ADDR'];
        if (count($direccionIP) < 7) {
            $direccionIP = gethostbyname(gethostname());
        }
        $nombreUsuario = $_SESSION['username'];
        $correoUsuario = $_SESSION['mail'];
        $contenidoComentario = $_POST['mensajeComentario'];
        $words = $commentsController->palabrasProhibidas();
        $contenidoComentario = str_replace($words, "*****", $contenidoComentario);
        $contenidoComentario = addslashes($contenidoComentario);
        $commentsController->nuevoComentario($idUsuario, $idNoticia, $direccionIP, $nombreUsuario, $correoUsuario, $contenidoComentario);
        unset($_POST['mensajeComentario']);

    }
}

if ($_POST['en_gestion'])
    header("Location: " . $_SERVER['HTTP_REFERER']);
else if (!(isset($_POST['mensajeComentario']))) {
    echo '<script src="../js/close_window.js"></script>';
}

