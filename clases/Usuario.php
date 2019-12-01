<?php

	class Usuario
	{
		private $idUsuario ;
		private $email ;
		private $nombre ;
		private $apellido ;
		private $idTipo ;
        private $telefono ;
		private $foto ;
		private $apiKey ;

		/**
		 */
		public function __construct() { }

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
	    public function getApi()
	    {
	        return $this->apiKey;
	    }

	    /**
	     * @param mixed $api
	     *
	     * @return self
	     */
	    public function setApi($apiKey)
	    {
	        $this->apiKey = $apiKey;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getEmail()
	    {
	        return $this->email;
	    }

	    /**
	     * @param mixed $email
	     *
	     * @return self
	     */
	    public function setEmail($email)
	    {
	        $this->email = $email;

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
	    public function getApellido()
	    {
	        return $this->apellido;
	    }

	    /**
	     * @param mixed $apellido
	     *
	     * @return self
	     */
	    public function setApellido($apellido)
	    {
	        $this->apellido = $apellido;

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
	    public function getIdTipo()
	    {
	        return $this->idTipo;
	    }

	    /**
	     * @param mixed $idTipo
	     *
	     * @return self
	     */
	    public function setIdTipo($idTipo)
	    {
	        $this->idTipo = $idTipo;

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

	    /**
	     */
	    public function __toString()
	    {
	    	return $this->nombre." ".$this->apellido ;
	    }
	}
    
    ?>