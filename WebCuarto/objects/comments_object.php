<?php

class Comments
{
    private $idComentario;
    private $idUsuario;
    private $idNoticia;
    private $direccionIp;
    private $nombreUsuario;
    private $correoUsuario;
    private $contenidoComentario;
    private $fechaHoraComentario;

    /**
     * @return mixed
     */
    public function getIdComentario()
    {
        return $this->idComentario;
    }

    /**
     * @param mixed $idComentario
     */
    public function setIdComentario($idComentario)
    {
        $this->idComentario = $idComentario;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdNoticia()
    {
        return $this->idNoticia;
    }

    /**
     * @param mixed $idNoticia
     */
    public function setIdNoticia($idNoticia)
    {
        $this->idNoticia = $idNoticia;
    }

    /**
     * @return mixed
     */
    public function getDireccionIp()
    {
        return $this->direccionIp;
    }

    /**
     * @param mixed $direccionIp
     */
    public function setDireccionIp($direccionIp)
    {
        $this->direccionIp = $direccionIp;
    }

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param mixed $nombreUsuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * @return mixed
     */
    public function getCorreoUsuario()
    {
        return $this->correoUsuario;
    }

    /**
     * @param mixed $correoUsuario
     */
    public function setCorreoUsuario($correoUsuario)
    {
        $this->correoUsuario = $correoUsuario;
    }

    /**
     * @return mixed
     */
    public function getContenidoComentario()
    {
        return $this->contenidoComentario;
    }

    /**
     * @param mixed $contenidoComentario
     */
    public function setContenidoComentario($contenidoComentario)
    {
        $this->contenidoComentario = $contenidoComentario;
    }

    /**
     * @return mixed
     */
    public function getFechaHoraComentario()
    {
        return $this->fechaHoraComentario;
    }

    /**
     * @param mixed $fechaHoraComentario
     */
    public function setFechaHoraComentario($fechaHoraComentario)
    {
        $this->fechaHoraComentario = $fechaHoraComentario;
    }


}