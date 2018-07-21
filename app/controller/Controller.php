<?php
namespace controller;
use vendor\Tpl;
class Controller extends Tpl
{
	function __construct()
	{
		$config = $GLOBALS['config'];
		$cacheDir = $config['TPL_CACHE'];
		$viewDir = $config['TPL_VIEW'];
		parent::__construct($cacheDir, $viewDir);
	}
	
	function display($viewName = null, $isInclude = true, $uri = null)
	{
		if (empty($viewName)) {
			$viewName = $_GET['c'] . '/' . $_GET['a'] . '.html';
		}
		parent::display($viewName, $isInclude, $uri);
	}
	
	function notice($msg, $url = null, $second = 3)
	{
		if (empty($url)) {
			$url = $_SERVER['HTTP_REFERER'];
		}
		$this->assign('msg', $msg);
		$this->assign('url', $url);
		$this->assign('second', $second);
		$this->display('notice.html');
	}
}