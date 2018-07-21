<?php

//index.php?c=index&a=index

function myAutoLoad($className)
{
	// controller\IndexController
	// controller/IndexController.php
	// app/controller/IndexController.php
	$arr = [
		'controller' => 'app/controller',
		'model' => 'app/model',
	];
	//按照最后一个斜线将带有命名空间的类名拆分为命名空间名和真正的类名
	$pos = strrpos($className, '\\');
	//提取命名空间名
	$namespace = substr($className, 0, $pos);
	//提取类名
	$class = substr($className, $pos + 1);
	
	//var_dump($namespace, $class);
	if (array_key_exists($namespace, $arr)) {
		$path = rtrim($arr[$namespace], '/') . '/';
	} else {
		$path = rtrim($namespace, '/') . '/';
	}
	//拼接完整的路径
	$filePath = $path . $class . '.php';
	include $filePath;
}

spl_autoload_register('myAutoLoad');

$c = empty($_GET['c']) ? 'index' : $_GET['c'];
$a = empty($_GET['a']) ? 'index' : $_GET['a'];

$c = 'controller\\' . ucfirst($c) . 'Controller';
$obj = new $c();
call_user_func([$obj, $a]);






















