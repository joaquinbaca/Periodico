<?php

require_once("../config/conexion.php");

class ManageComments
{
    private $connection;

    public function __construct()
    {
        $this->connection = connectDB();
    }

    public function getPalabrasProhibidas()
    {
        $sql = "SELECT * FROM palabras_prohibidas";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $iter = $result->num_rows;
            $arrayFoo = array();
            for ($i = 0; $i < $iter; $i++) {
                $row = $result->fetch_assoc();
                $foo = $row['lista_palabras'];
                array_push($arrayFoo, $foo);
            }
            return $arrayFoo;
        } else {
            echo "No se encuentra ninguna palabra prohibida.";
        }
    }

    public function getComentariosPorId($id_noticia)
    {
        $sql = "SELECT * FROM comentarios WHERE id_noticia = '$id_noticia'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            include_once("../objects/comments_object.php");
            $iter = $result->num_rows;
            $arrayFoo = array();
            for ($i = 0; $i < $iter; $i++) {
                $row = $result->fetch_assoc();
                $foo = new Comments();
                $foo->setIdComentario($row['id_comentario']);
                $foo->setIdUsuario($row['id_usuario']);
                $foo->setIdNoticia($row['id_noticia']);
                $foo->setDireccionIp($row['direccion_ip']);
                $foo->setNombreUsuario($row['nombre_usuario']);
                $foo->setCorreoUsuario($row['correo_usuario']);
                $foo->setContenidoComentario($row['contenido_comentario']);
                $foo->setFechaHoraComentario($row['fecha_hora_comentario']);
                array_push($arrayFoo, $foo);
            }
            return $arrayFoo;
        } else {
            echo "La noticia aún no ha sido comentada";
        }
    }

    public function setNuevoComentario($id_usuario, $id_noticia, $direccion_ip, $nombre_usuario, $correo_usuario, $contenido_comentario)
    {
        $sql = "INSERT INTO comentarios (id_usuario, id_noticia, direccion_ip, nombre_usuario, correo_usuario, contenido_comentario)
            VALUES ('$id_usuario', '$id_noticia', '$direccion_ip', '$nombre_usuario', '$correo_usuario', '$contenido_comentario')";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo añadir el comentario.";
        }
    }

    public function unsetComentario($id_comentario)
    {
        $sql = "DELETE FROM comentarios WHERE comentarios.id_comentario = '$id_comentario'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo eliminar el comentario.";
        }
    }

    public function updateComentario($id_comentario, $contenido_comentario)
    {
        $sql = "UPDATE comentarios SET contenido_comentario='$contenido_comentario' WHERE comentarios.id_comentario = '$id_comentario'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar el comentario.";
        }
    }
}