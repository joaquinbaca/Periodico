<?php
    $enGestion = false;
    if (substr_count($_SERVER['PHP_SELF'], "comments") > 0)
        $enGestion = true;
?>

<?php
    include_once("../controller/comments_controller.php");
    $commentsController = new CommentsController();
    if (!$enGestion) {
        echo '<a href="javascript:void(0)" class="botonCerrar" onclick="OcultarComentarios()">&times;</a>';
        $commentsController->comentariosPorId($_GET['id_noticia']);
    } else
        $commentsController->comentariosPorIdConfig($_GET['id_noticia']);
?>

<?php
    if (isset($_SESSION['id'])) {
        $words = $commentsController->palabrasProhibidas();
        $wordsJS = implode(",", $words);
        if ($enGestion) {
            echo "<div class='contenedor-comentario-opciones'>";
            echo "<h2>Añadir nuevo comentario</h2>";
        }
        echo '<div class="ComentarioOpciones">';
        echo '<form action="../config/add_comment.php?id_noticia=' . $_GET['id_noticia'] . '" name="Fmensaje" method="post" '; if (!$enGestion) echo 'target="_blank">'; else echo '>';
        echo '<input name="en_gestion" type="hidden" value="' . $enGestion . '">';
        echo '<textarea name="mensajeComentario" placeholder="Comentario" required></textarea>';
        echo '<input value="Enviar" type="submit" id="Enviar" onclick="AnadirComentario(' . "'" . $wordsJS . "'" . ', ' . "'" . $_SESSION['username'] . "'" . ', ' . "'" . $_SESSION['mail'] . "'" . ');">';
        echo '</form>';
        echo '</div>';
        if ($enGestion)
            echo "</div>";
    }
?>