<?php
namespace Loading\View;

use Loading\Exception\DevException;
require_once('models/Auth.php');

class Template
{
	protected $variables = array();
	protected $file;

	function __construct($file)
	{
		$this->file = $file;
	}
	
	public function with($var, $value = null)
	{
		if(is_array($var))
			$this->variables = array_merge($this->variables, $var);
		else
			$this->variables[$var] = $value;
	}
	
	public function render()
	{
		$tplpath = __DIR__.'/../../../app/views/'.$this->file;
		if (!file_exists($tplpath)) {
			throw new DevException(LANG_L77Tr29.$this->file, 'L77Tr');
		}
		else
		{
			ob_start();
			include 'views/'.$this->file;
			$html = ob_get_clean();
			return $html;
		}
	}

}