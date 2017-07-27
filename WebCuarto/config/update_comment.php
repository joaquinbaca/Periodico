<?php

session_start();

if (isset($_SESSION['id'])) {

    require_once("../controller/comments_controller.php");
    $commentsController = new CommentsController();

    if (isset($_POST['mensaje_comentario'])) {
        $idComentario = $_POST['id_comentario'];
        $contenidoComentario = $_POST['mensaje_comentario'];
        $commentsController->actualizarComentarioPorId($idComentario, $contenidoComentario);
        unset($_POST['mensaje_comentario']);
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
