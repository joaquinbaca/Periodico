<?php

	class News {
		
		private $idNoticia;
		private $idRedactor;
		private $tituloNoticia;
		private $subtituloNoticia;
		private $entradillaNoticia;
		private $contenidoNoticia;
		private $fechaHoraNoticia;
		private $imagenNoticia;
		private $autorImagen;
		private $posicionNoticia;
		private $subseccionNoticia;
        
        public function getIdNoticia()
        {
            return $this->idNoticia;
        }

        public function setIdNoticia($idNoticia)
        {
            $this->idNoticia = $idNoticia;
        }

        public function getIdRedactor()
        {
            return $this->idRedactor;
        }

        public function setIdRedactor($idRedactor)
        {
            $this->idRedactor = $idRedactor;
        }

        public function getTituloNoticia()
        {
            return $this->tituloNoticia;
        }

        public function setTituloNoticia($tituloNoticia)
        {
            $this->tituloNoticia = $tituloNoticia;
        }

        public function getSubtituloNoticia()
        {
            return $this->subtituloNoticia;
        }

        public function setSubtituloNoticia($subtituloNoticia)
        {
            $this->subtituloNoticia = $subtituloNoticia;
        }

        public function getEntradillaNoticia()
        {
            return $this->entradillaNoticia;
        }

        public function setEntradillaNoticia($entradillaNoticia)
        {
            $this->entradillaNoticia = $entradillaNoticia;
        }

        public function getContenidoNoticia()
        {
            return $this->contenidoNoticia;
        }

        public function setContenidoNoticia($contenidoNoticia)
        {
            $this->contenidoNoticia = $contenidoNoticia;
        }

        public function getFechaHoraNoticia()
        {
            return $this->fechaHoraNoticia;
        }

        public function setFechaHoraNoticia($fechaHoraNoticia)
        {
            $this->fechaHoraNoticia = $fechaHoraNoticia;
        }

        public function getImagenNoticia()
        {
            return $this->imagenNoticia;
        }

        public function setImagenNoticia($imagenNoticia)
        {
            $this->imagenNoticia = $imagenNoticia;
        }

        public function getAutorImagen()
        {
            return $this->autorImagen;
        }

        public function setAutorImagen($autorImagen)
        {
            $this->autorImagen = $autorImagen;
        }

        public function getPosicionNoticia()
        {
            return $this->posicionNoticia;
        }

        public function setPosicionNoticia($posicionNoticia)
        {
            $this->posicionNoticia = $posicionNoticia;
        }

        public function getSubseccionNoticia()
        {
            return $this->subseccionNoticia;
        }

        public function setSubseccionNoticia($subseccionNoticia)
        {
            $this->subseccionNoticia = $subseccionNoticia;
        }


		
	}