<?php
header("Access-Control-Allow-Origin: *");
require_once __DIR__.'/../bootstrap/paths.php';
require_once 'config/Config.php';
require_once 'settings.php';
require_once 'autoload.php';

use Loading\Routing\Router;

$app = new Router;
$app->run();



	





