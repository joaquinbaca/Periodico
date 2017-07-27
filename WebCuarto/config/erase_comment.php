<?php

session_start();

if (isset($_SESSION['id'])) {

    require_once("../controller/comments_controller.php");
    $commentsController = new CommentsController();

    if (isset($_POST['id_comentario'])) {
        $idComentario = $_POST['id_comentario'];
        $commentsController->eliminarComentarioPorId($idComentario);
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
