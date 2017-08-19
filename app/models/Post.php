<?php

use Loading\Database\Model;

class Post extends Model
{
	/**
	* Name of the corresponding table
	* @access protected
	* @var string
	**/
	protected $table;

	function __construct()
	{
		parent::__construct();
		$this->table = 'posts';
	}
	
	/**
	 * Get posts from posts table
	 */
	public function getPosts()
	{
		$date = date_create('',timezone_open('Africa/Tunis'));
		date_sub($date, date_interval_create_from_date_string('30 days'));
		$compare = date_format($date, 'Y-m-d h:m:s');
		$clause = "date_sent > '$compare';";
		$askfor = "SELECT * FROM $this->table WHERE $clause";
		$result = $this->connection->query($askfor);
		return $result->fetchAll();
	}
}
