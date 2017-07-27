<?php

require_once("../model/comments_model.php");

class CommentsController
{
    private $comments;

    public function __construct()
    {
        $this->comments = new ManageComments();
    }

    public function palabrasProhibidas()
    {
        $words = $this->comments->getPalabrasProhibidas();
        return $words;
    }

    public function comentariosPorId($id_noticia) {
        $arrayFoo = $this->comments->getComentariosPorId($id_noticia);

        for ($i = 0; $i < count($arrayFoo); $i++) {
            echo '<div id="comentariox">';
            echo '<h3>' . $arrayFoo[$i]->getNombreUsuario() . '<span class="fechaComentario"> - ' . $arrayFoo[$i]->getFechaHoraComentario() . '</span></h3>';
            echo '<p class="parrafoComentario">' . $arrayFoo[$i]->getContenidoComentario() . '</p>';
            echo '<p class="correoComentario">' . $arrayFoo[$i]->getCorreoUsuario() . '</p>';
            echo '<hr>';
            echo '</div>';
        }
    }

    // Se diferencia del anterior, en que encapsula los comentarios en un contenedor y da opciones
    public function comentariosPorIdConfig($id_noticia) {
        $arrayFoo = $this->comments->getComentariosPorId($id_noticia);

        echo "<div class='contenedor-comentarios'>";

        for ($i = 0; $i < count($arrayFoo); $i++) {
            echo '<div id="comentariox">';
            echo '<h3>' . $arrayFoo[$i]->getNombreUsuario() . '<span class="fechaComentario"> - ' . $arrayFoo[$i]->getFechaHoraComentario() . '</span></h3>';
            echo '<p class="parrafoComentario">' . $arrayFoo[$i]->getContenidoComentario() . '</p>';
            // formulario de edicion oculto
            echo '<form class="edicion-comentario" action="../config/update_comment.php" method="post">';
            echo '<input name="id_comentario" type="hidden" value="' . $arrayFoo[$i]->getIdComentario() . '">';
            echo "<textarea name='mensaje_comentario' required>" . $arrayFoo[$i]->getContenidoComentario() . "</textarea>";
            echo "<input type='submit' value='Modificar'>";
            echo "</form>";
            // fin - formulario de edicion oculto
            echo "<div class='contenedor-config-comentario'>";
            echo '<p class="correoComentario">' . $arrayFoo[$i]->getCorreoUsuario() . '</p>';
            echo '<div class="contenedor-config-comentario-derecha">';
            echo "<span class='id-comentario-config'> " . $arrayFoo[$i]->getIdComentario() .  " </span>";
            echo '<form action="../config/erase_comment.php" method="post">';
            echo '<input name="id_comentario" type="hidden" value="' . $arrayFoo[$i]->getIdComentario() . '">';
            echo '<input class="boton-eliminar" type="submit" value="Eliminar">';
            echo '</form>';
            echo '<button class="boton-modificar" type ="button" onclick="editarComentario(' . $arrayFoo[$i]->getIdComentario() . ')">Modificar</button>';
            echo '</div>';
            echo "</div>";
            echo '<hr>';
            echo '</div>';
        }
        echo "</div>";
    }

    public function nuevoComentario($id_usuario, $id_noticia, $direccion_ip, $nombre_usuario, $correo_usuario, $contenido_comentario)
    {
        $this->comments->setNuevoComentario($id_usuario, $id_noticia, $direccion_ip, $nombre_usuario, $correo_usuario, $contenido_comentario);
    }

    public function eliminarComentarioPorId($id_comentario)
    {
        $this->comments->unsetComentario($id_comentario);
    }

    public function actualizarComentarioPorId($id_comentario, $contenido_comentario)
    {
        $this->comments->updateComentario($id_comentario, $contenido_comentario);
    }
}