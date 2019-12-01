<?php

	class Compra
	{
		private $idProducto ;
		private $idPuesto ;
		private $idUsuario ;
		private $precio ;
		private $cantidad ;
		private $fechaPedido ;
        private $horaRecogida ;
        private $aceptado ;

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
	    public function getPrecio()
	    {
	        return $this->precio;
	    }

	    /**
	     * @param mixed $precio
	     *
	     * @return self
	     */
	    public function setPrecio($precio)
	    {
	        $this->precio = $precio;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCantidad()
	    {
	        return $this->cantidad;
	    }

	    /**
	     * @param mixed $cantidad
	     *
	     * @return self
	     */
	    public function setCantidad($cantidad)
	    {
	        $this->cantidad = $cantidad;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getFechaPedido()
	    {
	        return $this->fechaPedido;
	    }

	    /**
	     * @param mixed $fechaPedido
	     *
	     * @return self
	     */
	    public function setFechaPedido($fechaPedido)
	    {
	        $this->fechaPedido = $fechaPedido;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getHoraRecogida()
	    {
	        return $this->horaRecogida;
	    }

	    /**
	     * @param mixed $horaRecogida
	     *
	     * @return self
	     */
	    public function setHoraRecogida($horaRecogida)
	    {
	        $this->horaRecogida = $horaRecogida;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getAceptado()
	    {
	        return $this->aceptado;
	    }

	    /**
	     * @param mixed $aceptado
	     *
	     * @return self
	     */
	    public function setAceptado($aceptado)
	    {
	        $this->aceptado = $aceptado;

	        return $this;
        }
        
	}
    
    ?>