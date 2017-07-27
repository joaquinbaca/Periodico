<?php

if (file_exists("config/conexion.php"))
    include_once("config/conexion.php");
else
    include_once("../config/conexion.php");

class ManageSections
{
    private $connection;

    public function __construct()
    {
        $this->connection = connectDB();
    }

    public function getSections()
    {
        $sql = "SELECT * FROM secciones";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            if (file_exists("objects/sections_object.php"))
                include_once("objects/sections_object.php");
            else
                include_once("../objects/sections_object.php");
            $iter = $result->num_rows;
            $arrayFoo = array();
            for ($i = 0; $i < $iter; $i++) {
                $row = $result->fetch_assoc();
                $foo = new Sections();
                $foo->setIdSeccion($row['id_seccion']);
                $foo->setNombreSeccion($row['nombre_seccion']);
                array_push($arrayFoo, $foo);
            }
            return $arrayFoo;
        } else {
            echo "No se encuentra ninguna sección.";
        }
    }

    public function addSeccion($nombreSeccion)
    {
        $sql = "INSERT INTO secciones(nombre_seccion)
                VALUES('$nombreSeccion')";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo añadir la sección.";
        }
    }

    public function eraseSeccion($idSeccion)
    {
        $sql = "DELETE FROM secciones WHERE id_seccion='$idSeccion'";
        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo eliminar la sección.";
        }
        $sql = "DELETE FROM subsecciones WHERE id_seccion='$idSeccion'";
        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo eliminar las subsecciones.";
        }
    }

    public function updateSeccion($nombreSeccion, $idSeccion)
    {
        $sql = "UPDATE secciones SET nombre_seccion='$nombreSeccion' WHERE id_seccion='$idSeccion'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar la sección.";
        }
    }
}