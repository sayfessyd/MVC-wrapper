<?php
namespace Loading\Database;

use Loading\Exception\DevException;

class Model
{
	protected $connection;

	function __construct($db = 'mysql')
	{
		$dsn = $db.':dbname='.BASE.';host='.SERVER.';charset=UTF8';
		$connection = new \PDO($dsn, USER, PASS);
		$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$this->connection = $connection;
	}

	

	
}