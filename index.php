<?php

define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

require(ROOT.'core/Model.php');
require(ROOT.'core/Controller.php');

$params = explode('/',$_GET['p']);
$controller = !empty($params[0]) ? $params[0] : 'user';
$action = isset($params[1]) && !empty($params[1]) ? $params[1] : 'index';

if(isset($params[2]) && isset($params[3]))
{
	$_GET['p1'] = $params[2];
	$_GET['p2'] = $params[3];
}

if(!file_exists('controllers/'.$controller.'Controller.php'))
{
	require_once("error404.php") ;
}
else
{
	require('controllers/'.$controller.'Controller.php');
	$controller = new $controller();
}

if(method_exists($controller, $action))
{
	unset($params[0]);
	unset($params[1]);
	call_user_func_array(array($controller,$action),$params);
}
else 
{
	require_once("error404.php");
}

?>