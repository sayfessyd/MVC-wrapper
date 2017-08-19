<?php

use Loading\Database\Model;

class User extends Model
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
		$this->table = 'users';
	}
	
	public function setUser($values)
	{
		$gravatar_hash = $md5(strtolower(trim("{$values['email']}")));
		$askfor = "INSERT INTO $this->table (mobile_id, first_name, last_name, user_name, email, password, gravatar_hash, photo_profile, gender, date_of_birth, country, city, confirmed) 
		VALUES (:mobileid, :firstname, :lastname, :username, :email, :password, $gravatar_hash, :photoprofile, :gender, :dateofbirth, :country, :city, false);";
		$sql = $this->connection->prepare($askfor);
		$sql->execute($values);
	}
}
