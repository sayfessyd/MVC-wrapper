<?php

use Loading\Routing\Controller;
use Loading\Routing\ControllerInterface;
use Loading\View\Template;
require_once('models/Post.php');
require_once('models/Auth.php');

class HomeController extends Controller implements ControllerInterface
{
	private $Post;
	private $Auth;
	private $User;

	function __construct ()
	{
		$Post = new Post;
		$Auth = new Auth;
		$User = new User;
	}

	public function defaultAction()
	{
		$this->stream();
	}

	public function stream()
	{
		$view = new Template("home.tpl");
		$variables = $this->Post->getPosts();
		$view->with($variables);
		echo $view->render();
	}

	public function login()
	{
		$view = new Template("user.tpl");
		$username = ( isset($_POST['user_name']) ) ? $_POST['user_name'] : null;
		$password = ( isset($_POST['password']) ) ? $_POST['password'] : null;
		$values = array(':username' => $username, ':password' => $password);
		$variables = $this->Auth->getUser($values);

		if ( empty($variables) )
			throw new ProdException(LANG_ErrorLogin, 'Error Login');
		else
			$this->Auth->addSession($variables['user_name']);

		$view->with($variables);
		echo $view->render();
	}

	public function logout()
	{
		$this->Auth->deleteSession($_COOKIE['Auth']);
	}

	public function signUp()
	{
		if ( 	(isset($_POST['firstname'])) && (strlen($_POST['first_name']) > 1)
			 && (isset($_POST['lastname'])) && (strlen($_POST['last_name']) > 1)
			 && (isset($_POST['username'])) && (strlen($_POST['username']) > 6)
			 && (isset($_POST['email'])) && (strlen($_POST['email']) > 10)
			 && (isset($_POST['password'])) && (strlen($_POST['password']) >= 8)
			 && (isset($_POST['gender']))
			 && (isset($_POST['dateofbirth']))
			 && (isset($_POST['country']))
			)
		{
			$view = new Template("message.tpl");
			
			$this->User->setUser($_POST);
		}
			
	}



}