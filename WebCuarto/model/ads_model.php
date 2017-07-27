<?php

if (file_exists("config/conexion.php"))
    include_once("config/conexion.php");
else
    include_once("../config/conexion.php");

class ManageAds
{
    private $connection;

    public function __construct()
    {
        $this->connection = connectDB();
    }

    public function getAnunciosPortada()
    {
        $sql = "SELECT * FROM publicidad WHERE tipo_publicidad='portada'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            if (file_exists("objects/ads_object.php"))
                include_once("objects/ads_object.php");
            else
                include_once("../objects/ads_object.php");
            $iter = $result->num_rows;
            $arrayFoo = array();
            for ($i = 0; $i < $iter; $i++) {
                $row = $result->fetch_assoc();
                $foo = new Ads();
                $foo->setIdPublicidad($row['id_publicidad']);
                $foo->setNombrePublicidad($row['nombre_publicidad']);
                $foo->setAltPublicidad($row['alt_publicidad']);
                array_push($arrayFoo, $foo);
            }
            return $arrayFoo;
        } else {
            echo "No se encuentra ninguna publicidad para la portada.";
        }
    }

    public function getAnunciosNoticia()
    {
        $sql = "SELECT * FROM publicidad WHERE tipo_publicidad='noticia'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            include_once("../objects/ads_object.php");
            $iter = $result->num_rows;
            $arrayFoo = array();
            for ($i = 0; $i < $iter; $i++) {
                $row = $result->fetch_assoc();
                $foo = new Ads();
                $foo->setIdPublicidad($row['id_publicidad']);
                $foo->setNombrePublicidad($row['nombre_publicidad']);
                $foo->setAltPublicidad($row['alt_publicidad']);
                array_push($arrayFoo, $foo);
            }
            return $arrayFoo;
        } else {
            echo "No se encuentra ninguna publicidad para la noticia.";
        }
    }

    public function addAnuncio($nombrePublicidad, $altPublicidad, $tipoPublicidad)
    {
        $sql = "INSERT INTO publicidad(nombre_publicidad, alt_publicidad, tipo_publicidad)
                VALUES('$nombrePublicidad', '$altPublicidad', '$tipoPublicidad')";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo añadir el anuncio.";
        }
    }

    public function eraseAnuncio($idPublicidad)
    {
        $sql = "DELETE FROM publicidad WHERE id_publicidad='$idPublicidad'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo eliminar el anuncio.";
        }
    }

    public function updateAnuncio($idPublicidad, $nombrePublicidad, $altPublicidad)
    {
        $sql = "UPDATE publicidad SET nombre_publicidad='$nombrePublicidad', alt_publicidad='$altPublicidad' WHERE id_publicidad='$idPublicidad'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar el anuncio.";
        }
    }
}