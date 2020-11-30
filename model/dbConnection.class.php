<?php
/*
* Mysql database class - only one connection alowed
*/
abstract class dbConnection {
	private static $_connection;

	private static function setBdd() {
		try{
		self::$_connection = new PDO("mysql:host=localhost; dbname=vo;", "root", "");
		self::$_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		} catch (PdoException $e) {
            echo 'Error : '.$e->getMessage();
        }
	}

	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_connection) { 
			self::setBdd();
		}
		return self::$_connection;
	}

	
	public function __destruct() {
		$this->_connection = null;
	}
	
	public function getConnection() {
		return $this->_connection;
	}
}