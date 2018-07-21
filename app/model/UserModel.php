<?php

namespace model;
use vendor\Model;
class UserModel extends Model
{
	function add($data)
	{
		//你自己判断一下下哦
		$id = $this->insert($data);
		return $id;
	}
}