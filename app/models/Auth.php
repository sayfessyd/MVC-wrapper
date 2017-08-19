<?php

use Loading\Database\Model;

class Auth extends Model
{
	/**
	* name of the corresponding table
	* @access protected
	* @var string
	**/
	protected $table;
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'users_auth';
	}

	/**
	 * Check if user is authenticated
	 */
	static function check()
	{
		if ( isset($_COOKIE['Auth']) ) {
			$connection = mysqli_connect(SERVER, USER, PASS, BASE);
			if ( !$connection ) 
				throw new DevException(LANG_L44Ac28, 'L44Ac');
			mysqli_set_charset($connection, "utf8");
			$hash = mysqli_real_escape_string($connection, $_COOKIE['Auth']);
			$askfor = "SELECT * FROM user_auth WHERE hash = '$hash' ORDER BY expire_date DESC;";
			$result = mysqli_query($connection, $askfor);
			$session = mysqli_fetch_assoc($result);
			if ( empty($session) )
			{
				mysqli_close($connection);
				return false;
			}
			else
			{
				$date = date_create('',timezone_open('Africa/Tunis'));
				$now = date_format($date, 'Y-m-d h:m:s');
				$expire_date = strtotime($session['expire_date']);
				if ( $expire_date < $now ) {
					$askfor = "DELETE FROM user_auth WHERE hash = '$hash' AND expire_date < '$now';";
					mysqli_real_query($connection, $askfor);
					setcookie("Auth", "", time()-3600);
				}
				else
				{
					$new_expire_date = $now;
					date_add($new_expire_date, date_interval_create_from_date_string('15 days'));
					$askfor = "UPDATE user_auth SET expire_date = '$new_expire_date' WHERE hash = '$hash';"; 
					setcookie("Auth", $hash, time()+3600*24*15, "/");
				}
				mysqli_close($connection);
				return true;
			}
		}
		else
			return false;
	}

	public function getUser($values)
	{
		$clause = "user_name = :username AND password = :password AND confirmed = true;";
		$askfor = "SELECT * FROM $this->table WHERE $clause";
		$sql = $this->connection->prepare($askfor);
		$sql->execute($values);
		return $sql->fetch();
	}

	public function addSession($username, $keepConnected = false)
	{
		$chars = "qazwsxedcrfvtgbyhnujmik,ol.p;/1234567890QAZWSXEDCRFVTGBYHNUJMIKOLP";
        $hash = sha1($username);
        for($i = 0; $i<12; $i++)
        {
            $hash .= $chars[rand(0, 64)]; 
        }
        $date = date_create('',timezone_open('Africa/Tunis'));
        if ( $keepConnected == true )
        {
        	date_add($date, date_interval_create_from_date_string('15 days'));
        	setcookie("Auth", $hash, time()+3600*24*15, "/");
        }
        else
        {
        	date_add($date, date_interval_create_from_date_string('2 hours'));
        	setcookie("Auth", $hash, 0, "/");
        }
        $expire_date = date_format($date, 'Y-m-d h:m:s');
		$askfor = "INSERT INTO $this->table (user_name, hash, expire_date) VALUES ('$username', '$hash', '$expire_date');";
		$this->connection->exec($askfor);
	}

	public function deleteSession($hash)
	{
		$askfor = "DELETE FROM $this->table WHERE hash = :hash;";
		$sql = $this->connection->prepare($askfor);
		$sql->bindValue(':hash', $hash, PDO::PARAM_STR);
		$sql->execute();
		setcookie("Auth", "", time()-3600, "/");
	}




	
}