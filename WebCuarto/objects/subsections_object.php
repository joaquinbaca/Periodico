<?php

class Subsections
{
    private $idSubseccion;
    private $idSeccion;
    private $nombreSubseccion;

    /**
     * @return mixed
     */
    public function getIdSubseccion()
    {
        return $this->idSubseccion;
    }

    /**
     * @param mixed $idSubseccion
     */
    public function setIdSubseccion($idSubseccion)
    {
        $this->idSubseccion = $idSubseccion;
    }

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
    public function getNombreSubseccion()
    {
        return $this->nombreSubseccion;
    }

    /**
     * @param mixed $nombreSubseccion
     */
    public function setNombreSubseccion($nombreSubseccion)
    {
        $this->nombreSubseccion = $nombreSubseccion;
    }


}