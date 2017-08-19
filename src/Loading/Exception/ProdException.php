<?php
namespace Loading\Exception;

use \Exception;

class ProdException extends Exception
{
	private $code_ps;
	private $title;
	function __construct($message, $title)
	{
		parent::__construct($message);
		$this->title = $title;
		$str = 'getRandomCodeforException';
		$code = str_shuffle($str);
		$this->code_ps = $code;
	}
	public function getTitle()
	{
		return $this->title;
	}

	public function getCode_ps()
	{
		return $this->code_ps;
	}
}