<?php

/*=============================================
=            Error Configuration            =
=============================================*/

	/*==========  Mode  ==========*/

	if ( defined('MODE') ) 
		$mode = MODE;
	else
		trigger_error("Constant File: MODE constant must be defined", E_USER_ERROR);

	if ( $mode == 'Development' )
	{
		ini_set('display_errors', 1);
		ini_set('error_reporting', E_ALL);
		ini_set('log_errors', 1);
	}
	elseif ( $mode == 'Production' )
	{
		ini_set('display_errors', 0);
	}
	else 
	{
		trigger_error("Constant File: Unknown value for MODE {Development, Production}, Production MODE has been set.", E_USER_NOTICE);
		ini_set('display_errors', 0);
	}

	/*==========  Error Handler  ==========*/

	if ( defined('LOADWAVE_ERROR_HANDLER') ) 
		$error_handler = LOADWAVE_ERROR_HANDLER;
	else
		trigger_error("Constant File: LOADWAVE_ERROR_HANDLER constant must be defined", E_USER_ERROR);

	if ( $error_handler == 'On' )
	{
		require 'Loading/Exception/errorHandler.php';
		set_error_handler("errorHandler");
	}
	elseif ( $error_handler != 'Off' )
		trigger_error("Constant File: Unknown value for LOADWAVE_ERROR_HANDLER {On, Off}, default error_handler has been set.", E_USER_NOTICE);

/*-----  End of Error Configuration  ------*/


/*===============================================
=            Exception Configuration            =
===============================================*/

require 'Loading/Exception/exceptionHandler.php';
set_exception_handler("exceptionHandler");

/*-----  End of Exception Configuration  ------*/


/*==============================================
=            Database Configuration            =
==============================================*/

if ( defined('DATABASE') ) 
	$database = DATABASE;
else
	trigger_error("Constant File: DATABASE constant must be defined", E_USER_ERROR);

if ( $database == 'On' )
{
	define('SERVER', 'localhost');
	define('BASE', 'loadwave');
	define('USER', 'root');
	define('PASS', '');
}
elseif ( $database == 'Off' ) 
	trigger_error("Database is disabled, the application will not work correctly.", E_USER_ERROR);
else
	trigger_error("Constant File: Unknown value for DATABASE {On, Off}, Database is disabled.", E_USER_ERROR);

/*-----  End of Database Configuration  ------*/


/*==============================================
=            Language Configuration            =
==============================================*/

if ( defined('LANGUAGE') ) 
	$language = LANGUAGE;
else
	trigger_error("Constant File: LANGUAGE constant must be defined", E_USER_ERROR);

$json = file_get_contents(__DIR__.'/../app/language/lang.json');
$lang = json_decode($json, true);
if (isset($lang[$language])) {
$src = __DIR__."/../app/language/".$lang[$language]['src'];
if (file_exists($src))
		include $src;
else
{
	require __DIR__."/../app/language/en/en.php";
	trigger_error("language file not found, english language has been set", E_USER_NOTICE);
}
}
else
{
	require __DIR__."/../app/language/en/en.php";
	trigger_error("language not found in json file, english language has been set", E_USER_NOTICE);
}

/*-----  End of Language Configuration  ------*/












