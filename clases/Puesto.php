<?php

	class Puesto
	{
		private $idPuesto ;
		private $nombre ;
        private $telefono ;
        private $foto ;
		private $idUsuario;
		private $infoPuesto;
		

		/**
		 */
        public function __construct() { }
        
        /**
	     * @return mixed
	     */
	    public function getIdPuesto()
	    {
	        return $this->idPuesto;
	    }

	    /**
	     * @param mixed $idPuesto
	     *
	     * @return self
	     */
	    public function setIdPuesto($idPuesto)
	    {
	        $this->idPuesto = $idPuesto;

	        return $this;
		}
		

		/**
	     * @return mixed
	     */
	    public function getInfoPuesto()
	    {
	        return $this->infoPuesto;
	    }

	    /**
	     * @param mixed $infoPuesto
	     *
	     * @return self
	     */
		public function setInfoPuesto($infoPuesto)
	    {
	        $this->infoPuesto = $infoPuesto;
	        return $this;
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
	     *
	     * @return self
	     */
	    public function setIdUsuario($idUsu)
	    {
	        $this->idUsuario = $idUsu;

	        return $this;
        }
        
        /**
	     * @return mixed
	     */
	    public function getNombre()
	    {
	        return $this->nombre;
	    }

	    /**
	     * @param mixed $nombre
	     *
	     * @return self
	     */
	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;

	        return $this;
        }
        

        /**
	     * @return mixed
	     */
	    public function getFoto()
	    {
	        return $this->foto;
	    }

	    /**
	     * @param mixed $foto
	     *
	     * @return self
	     */
	    public function setFoto($foto)
	    {
	        $this->foto = $foto;

	        return $this;
        }
        
        /**
	     * @return mixed
	     */
	    public function getTelefono()
	    {
	        return $this->telefono;
	    }

	    /**
	     * @param mixed $telefono
	     *
	     * @return self
	     */
	    public function setTelefono($telefono)
	    {
	        $this->telefono = $telefono;

	        return $this;
        }
	}
?>