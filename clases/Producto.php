<?php

	class Producto
	{
		private $idProducto ;
		private $nombre ;
        private $origen ;

		/**
		 */
        public function __construct() { }
        
        /**
	     * @return mixed
	     */
	    public function getIdProducto()
	    {
	        return $this->idProducto;
	    }

	    /**
	     * @param mixed $idProducto
	     *
	     * @return self
	     */
	    public function setIdProducto($idProducto)
	    {
	        $this->idProducto = $idProducto;

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
	    public function getOrigen()
	    {
	        return $this->origen;
	    }

	    /**
	     * @param mixed $origen
	     *
	     * @return self
	     */
	    public function setOrigen($origen)
	    {
	        $this->origen = $origen;

	        return $this;
        }
	}
        ?>