<?php

class Sections
{
    private $idSeccion;
    private $nombreSeccion;

    /**
     * @return mixed
     */
    public function getIdSeccion()
    {
        return $this->idSeccion;
    }

    /**
     * @param mixed $idSeccion
     */
    public function setIdSeccion($idSeccion)
    {
        $this->idSeccion = $idSeccion;
    }

    /**
     * @return mixed
     */
    public function getNombreSeccion()
    {
        return $this->nombreSeccion;
    }

    /**
     * @param mixed $nombreSeccion
     */
    public function setNombreSeccion($nombreSeccion)
    {
        $this->nombreSeccion = $nombreSeccion;
    }


}