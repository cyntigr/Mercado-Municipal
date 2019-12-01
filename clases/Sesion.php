<?php

require_once("PdoDatabase.php") ;
require_once("Usuario.php") ;

class Sesion
{
	private $usuario ; 

	// segundos que se mantiene abierta la sesión
	private $time_expire = 30000 ;				
	private static $instancia = null ;

	/**
	 */
	private function __construct() { }

	/**
	 */
	private function __clone() { }	

	/**
	 */
	public function getUsuario() 
	{
		return $this->usuario ;
	}

	/**
	 */
	public function close()
	{
		// vaciamos las variables de sesión
		$_SESSION = [] ;

		// destruir la sesión
		session_destroy() ;
	}

	/**
	 */
	public static function getInstance()
	{
		session_start() ;

		// comprobamos si existe sesión
		if (isset($_SESSION["_sesion"])):
		// si existe deserializamos la sesión y guardamos en la instancia
			self::$instancia = unserialize($_SESSION["_sesion"] ) ;
		else:
			if (self::$instancia===null) 
		// si esta vacia, creamos una nueva sesión
				self::$instancia = new Sesion() ;
		endif ;

		// devolvemos la instancia
		return self::$instancia ;
	}

	/**
	 */
	public function login(string $ema, string $pas):bool
		{
			// instanciar la clase Database
			$db = pdoDatabase::getInstance("root","","mercadomunicipal") ;
			
			// buscamos el usuario
			$sql  = "SELECT * FROM usuario WHERE email= ? AND password= MD5(?) ; " ;
			$parametros = [$ema,$pas];

			if ($db->queryPdo($sql,$parametros)):

				// recuperamos la información del usuario
				$this->usuario = $db->getObject("Usuario") ;

				// si el usuario es correcto, iniciamos la sesión
				// guardamos el momento (segs.) en que se inicia
				// la sesión
				$_SESSION["time"]    = time() ;
				$_SESSION["_sesion"] = serialize(self::$instancia) ;
				
				// la sesión se ha iniciado
				return true ;

			endif ;

			// la sesión no se ha iniciado
			return false ;
		}

	/**
	 * @return bool
	 * Comprueba si ha expirado el tiempo de sesión
	 */
	public function isExpired():bool
	{
		return (time() - $_SESSION["time"] > $this->time_expire) ;
	}

	/**
	 * @return bool
	 * Comprueba si estas logueado 
	 */
	public function isLogged():bool
	{
		return !empty($_SESSION) ;
	}

	/**
	 * @return bool
	 * Comprueba si hay sesión activa
	 */
	public function checkActiveSession():bool
	{
		if ($this->isLogged())
			if (!$this->isExpired()) return true ;
		//
		return false ;
	}

	/**
	 * Para redireccionar a otra página
	 */
	public function redirect(string $url)
	{
		header("Location: $url") ;
		die() ;
	}

	/**
	 */
	public function __sleep()
	{
		return ["usuario", "instancia"] ;
	}

}




