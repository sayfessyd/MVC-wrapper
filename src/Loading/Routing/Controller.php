<?php
namespace Loading\Routing;

use Loading\Exception\DevException;

class Controller
{
	
	public function defaultAction()
	{
		throw new DevException(LANG_L99CdA11, 'L99CdA');
	}
	

}