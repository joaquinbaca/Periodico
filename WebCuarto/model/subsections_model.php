<?php

if (file_exists("config/conexion.php"))
    include_once("config/conexion.php");
else
    include_once("../config/conexion.php");

class ManageSubsections
{
    private $connection;

    public function __construct()
    {
        $this->connection = connectDB();
    }

    public function getSubsections($idSeccion)
    {
        $sql = "SELECT * FROM subsecciones WHERE id_seccion='$idSeccion'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            if (file_exists("objects/subsections_object.php"))
                include_once("objects/subsections_object.php");
            else
                include_once("../objects/subsections_object.php");
            $iter = $result->num_rows;
            $arrayFoo = array();
            for ($i = 0; $i < $iter; $i++) {
                $row = $result->fetch_assoc();
                $foo = new Subsections();
                $foo->setIdSubseccion($row['id_subseccion']);
                $foo->setIdSeccion($row['id_seccion']);
                $foo->setNombreSubseccion($row['nombre_subseccion']);
                array_push($arrayFoo, $foo);
            }
            return $arrayFoo;
        } else {
            echo "No se encuentra ninguna sección.";
        }
    }

    public function addSubseccion($nombreSubseccion, $idSeccion)
    {
        $sql = "INSERT INTO subsecciones(nombre_subseccion, id_seccion)
                VALUES('$nombreSubseccion', '$idSeccion')";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo añadir la sub.";
        }
    }

    public function eraseSubseccion($idSubseccion)
    {
        $sql = "DELETE FROM subsecciones WHERE id_subseccion='$idSubseccion'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo eliminar la subsección.";
        }
    }

    public function updateSubseccion($nombreSubseccion, $idSubseccion)
    {
        $sql = "UPDATE subsecciones SET nombre_subseccion='$nombreSubseccion' WHERE id_subseccion='$idSubseccion'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar la subsección.";
        }
    }
}