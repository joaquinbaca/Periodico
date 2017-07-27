<?php

class Ads
{
    private $idPublicidad;
    private $nombrePublicidad;
    private $altPublicidad;
    private $tipoPublicidad;

    /**
     * @return mixed
     */
    public function getIdPublicidad()
    {
        return $this->idPublicidad;
    }

    /**
     * @param mixed $idPublicidad
     */
    public function setIdPublicidad($idPublicidad)
    {
        $this->idPublicidad = $idPublicidad;
    }

    /**
     * @return mixed
     */
    public function getNombrePublicidad()
    {
        return $this->nombrePublicidad;
    }

    /**
     * @param mixed $nombrePublicidad
     */
    public function setNombrePublicidad($nombrePublicidad)
    {
        $this->nombrePublicidad = $nombrePublicidad;
    }

    /**
     * @return mixed
     */
    public function getAltPublicidad()
    {
        return $this->altPublicidad;
    }

    /**
     * @param mixed $altPublicidad
     */
    public function setAltPublicidad($altPublicidad)
    {
        $this->altPublicidad = $altPublicidad;
    }

    /**
     * @return mixed
     */
    public function getTipoPublicidad()
    {
        return $this->tipoPublicidad;
    }

    /**
     * @param mixed $tipoPublicidad
     */
    public function setTipoPublicidad($tipoPublicidad)
    {
        $this->tipoPublicidad = $tipoPublicidad;
    }
}