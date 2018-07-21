<?php

namespace controller;
use model\UserModel;
class UserController extends Controller
{
	function register()
	{
		$this->display();
	}
	
	function login()
	{
		$this->display();
	}
	
	function loginHandle()
	{
		$name = $_POST['name'];
		$pwd = $_POST['password'];
		$user = new UserModel();
		$result = $user->getByName($name);
		if ($result) {
			if ($result['password'] == $pwd) {
				$_SESSION['name'] = $name;
				//header('location:index.php');
				$this->notice('登录成功', 'index.php');
			} else {
				die('密码错误');
			}
		} else {
			die('用户不存在');
		}
	}
	
	function logout()
	{
		unset($_SESSION['name']);
		$this->notice('退出成功', 'index.php');
	}
	
	function registerHandle()
	{
		$user = new UserModel;
		//var_dump($user);
		$result = $user->add($_POST);
		if ($result) {
			echo '注册成功';
		} else {
			echo '注册失败';
		}
	}
}