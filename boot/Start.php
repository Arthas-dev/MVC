<?php

class Start
{
	public static $auto;
	static function init()
	{
		self::$auto = new Psr4Autoload();
	}
	
	static function router()
	{
		//取出控制器
		$c = empty($_GET['c']) ? 'index' : $_GET['c'];
		//取出方法
		$a = empty($_GET['a']) ? 'index' : $_GET['a'];
		$_GET['c'] = $c;
		$_GET['a'] = $a;
 
		//拼接带有命名空间的类名
		$c = 'controller\\' . ucfirst($c) . 'Controller';
		//创建对象
		$obj = new $c();
		call_user_func([$obj, $a]);
	}
}

Start::init();