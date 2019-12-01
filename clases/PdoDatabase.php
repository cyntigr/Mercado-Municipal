<?php
// Base de datos PDO
class pdoDatabase
{
	private $host = "localhost";

	private $dbName;
	private $dbUser;
	private $dbPass;

	private $pdo = null;
	private $result = null;
	private static $instance = null;

	/** 
	 * @param $dbu  - usuario
	 * @param $dbp  - contraseña
	 * @param $dbn  - nombre de la base de datos
	 */
	private function __construct($dbu, $dbp, $dbn)
	{
		$this->dbUser = $dbu;
		$this->dbPass = $dbp;
		$this->dbName = $dbn;

		//
		$this->connect();
	}


	public function exit()
	{
		$this->pdo = null;
	}

	/**
	 * Hacemos el método singleton 
	 * 
	 *
	 * @param $dbu 
	 * @param $dbp
	 * @param $dbn
	 */
	public static function getInstance($dbu, $dbp, $dbn)
	{
		// si no existe instancia la creamos
		if (pdoDatabase::$instance == null)
			pdoDatabase::$instance = new pdoDatabase($dbu, $dbp, $dbn);

		// devolvemos la instancia
		return pdoDatabase::$instance;
	}

	/*
		 * hacemos privado el método _CLONE para evitar clonaciones
		 */
	private function __clone()
	{ }

	/**
	 * Establece una conexión con la bases de datos en PDO
	 */
	private function connect()
	{
		try {

			$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName", "$this->dbUser", "$this->dbPass")
				or die("ERROR: Ha fallado la conexión, no se ha podido conectar a la base de datos.");
			$this->pdo->query("SET NAMES 'utf8';");
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die(“ERROR::“ . $e->getMessage());
		}
	}

	/**
	 * Ejecutamos la consulta y comprobamos 
	 * el resultado
	 * 
	 * @param $sql
	 * @return 
	 */
	public function queryPdo($sql, $parametros, $emulate = false): bool
	{
		if ($emulate) $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		$this->result = $this->pdo->prepare($sql);
		$ok = $this->result->execute($parametros);

		if (is_object($this->result))
			return ($this->result->rowCount() > 0);
		// si no es un objeto
		return $this->result;
	}

	/**
	 * Devuelve un objeto de la clase que le mandes
	 * $cls (tiene por defecto stdClass)
	 * @param 
	 * @return
	 */
	public function getObject($cls = "StdClass")
	{
		if (is_null($this->result)) return null;

		// si tenemos un resultado, lo devolvemos
		return $this->result->fetchObject($cls);
	}

	/**
	 */
	public function __wakeup()
	{
		$this->connect();
	}
}
