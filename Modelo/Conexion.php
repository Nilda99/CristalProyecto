<?php
	/**
	* Clase de conexion a la DB
	*/
	class Conexion extends PDO
	{
		private $tipoDB = 'mysql';
		private $servidor = 'localhost';
		private $user = 'root';
		private $password = '';
		private $db = 'cristal2';

		public function __construct()
		{
			try {
				  parent::__construct($this->tipoDB.':host='.$this->servidor.';dbname='.$this->db, $this->user, $this->password);
//				  echo "Conexion exitosa"." nil";
			} catch (PDOException $e ) {
				echo 'ERROR: No se logro hacer una conexion a la Base de Datos - '.$e->getMessage();
				exit;
			}
		}
	}

	// $connect = new Conexion();

 ?>