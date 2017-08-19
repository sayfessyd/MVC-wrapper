<?php

function errorHandler($level, $message, $script,
 $line, $context = array())
{
	switch ($level) {
		case E_RECOVERABLE_ERROR:
			$description = 'Catchable fatal error. It indicates that a probably dangerous error occurred, but did not leave the Engine in an unstable state.
			 If the error is not caught by a user defined handle, the application aborts as it was an E_ERROR. ';
			break;
		case E_WARNING:
			$description = 'Run-time warnings (non-fatal errors). Execution of the script is not halted.';
			break;
		case E_NOTICE:
			$description = 'Run-time notices. Indicate that the script encountered something that could indicate an error,
			 but could also happen in the normal course of running a script. ';
			break;
		case E_DEPRECATED:
			$description = 'Run-time notices. Enable this to receive warnings about code that will not work in future versions.';
			break;
		case E_STRICT:
			$description = 'Enable to have PHP suggest changes to your code which will ensure the best interoperability and forward compatibility of your code.';
			break;
		/*==========  User Type Errors  ==========*/
		case E_USER_ERROR:
			$description = 'User-generated error message. This is like an E_ERROR, except it is generated in PHP code by using the PHP function trigger_error().';
			break;
		case E_USER_WARNING:
			$description = 'User-generated warning message. This is like an E_WARNING, except it is generated in PHP code by using the PHP function trigger_error().';
			break;
		case E_USER_NOTICE:
			$description = 'User-generated notice message. This is like an E_NOTICE, except it is generated in PHP code by using the PHP function trigger_error().';
			break;
		case E_USER_DEPRECATED:
			$description = 'User-generated warning message. This is like an E_DEPRECATED,
			 except it is generated in PHP code by using the PHP function trigger_error().';
			break;
		default:
			$description = "No Description for this Level";
			break;
	}

	require_once __DIR__."/../View/Template.php";
	$view = new Loading\View\Template('error.tpl');
	$str = 'getRandomkeyforError';
	$key = str_shuffle($str);
	$tab = array('key' => $key, 'level' => $level, 'description' => $description, 'script' => $script, 'line' => $line, 'message' => $message);
	$view->with($tab);
	echo $view->render();

	if ( $level == E_USER_ERROR ) die;

}