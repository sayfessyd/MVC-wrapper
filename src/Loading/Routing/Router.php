<?php
namespace Loading\Routing;

use Loading\Exception\DevException;

class Router
{
	private $front = array();
	private $routes = array();

	public function setup()
	{
		$json = file_get_contents(__DIR__.'/../../../app/controllers/Routes.json');
		$this->routes = json_decode($json, true);
	}
	public function checkRoute()
	{
		return isset($this->routes[$this->front['ctrl'].'/'.$this->front['action']]);		
	}
	public function getStatus()
	{
		return $this->routes[$this->front['ctrl'].'/'.$this->front['action']]['status'];
	}
	public function splitUri()
	{
		$this->front['ctrl'] = (isset($_GET['ctrl'])) && (strlen($_GET['ctrl']) > 0) ? $_GET['ctrl'] : null;
		$this->front['action'] = (isset($_GET['action'])) && (strlen($_GET['action']) > 0) ? $_GET['action'] : "defaultAction";
		$this->front['params'] = (isset($_GET['params'])) && (strlen($_GET['params']) > 0) ? explode('/', rtrim($_GET['params'])) : array();
		if ($this->front['ctrl'] != null)
			return true;
		else
			return false;
	}

	public function run()
	{
		if (!$this->splitUri()) 
			throw new DevException(LANG_L99Rr38, 'L99Rr');
		else
		{
			$this->setup();
			$classname = $this->front['ctrl'].'Controller';
			$filepath = 'controllers'.DIRECTORY_SEPARATOR.$classname.'.php';
			if ($this->checkRoute()) 
			{
				if ($this->getStatus() == "broken")
					throw new DevException(LANG_L99Rr47, 'L99Rr');
				else
				{
					if (file_exists(__DIR__.'/../../../app/'.$filepath)) {
						require $filepath;
						$ctrl = new $classname;
					}
					else
						throw new DevException(LANG_L99Rr55.$classname, 'L99Rr');
						
					$method = $this->front['action'];
					if (method_exists($ctrl, $method)) 
						call_user_func_array(array($ctrl, $method), $this->front['params']);
					else
						throw new DevException(LANG_L99Rr61.$method, 'L99Rr');
				}
			}
			else
				throw new DevException(LANG_L99Rr65.$this->front['ctrl'].'/'.$this->front['action'], 'L99Rr');
			
		}
	}
}