<?php

use Loading\View\Template;

function exceptionHandler($e)
{
	if ( ($e instanceof Loading\Exception\DevException) && (MODE == 'Development') ) {
		$view = new Template('dev_exception.tpl');
		$tab = array('code' => $e->getCode_ps(), 'script' => $e->getFile(), 'line' => $e->getLine(), 'message' => $e->getMessage());
		$view->with($tab);
		echo $view->render();
		die;
	}
	elseif ( ($e instanceof PDOException) && (MODE == 'Development') ) {
		$view = new Template('dev_exception.tpl');
		$tab = array('code' => $e->getCode(), 'script' => $e->getFile(), 'line' => $e->getLine(), 'message' => utf8_encode($e->getMessage()));
		$view->with($tab);
		echo $view->render();
	}
	elseif ($e instanceof Loading\Exception\ProdException){
		$view = new Template('prod_exception.tpl');
		$tab = array('title' => $e->getTitle(), 'message' => $e->getMessage(), 'code' => $e->getCode_ps());
		$view->with($tab);
		echo $view->render();
	}
	elseif ( ($e instanceof Exception) && ( MODE == 'Development' ) && ( LOADWAVE_ERROR_HANDLER == 'On' ) ) {
		errorHandler(E_USER_ERROR, $e->getMessage(), $e->getFile(), $e->getLine());
	}
}