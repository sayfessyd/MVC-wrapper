<?php
namespace Loading\Exception;

use \Exception;

class DevException extends Exception
{
	private $code_ps;
	public $chained;

	function __construct($message, $code, $chained = false)
	{
		parent::__construct($message);
		$this->code_ps = $code.$this->getLine();
		$this->chained = $chained;
	}

	public function getCode_ps()
	{
		return $this->code_ps;
	}
}