<?php
namespace app\cestbonadmin\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;
use \app\cestbonadmin\model\User as UserModel;
/**
* 
*/
class User extends Common{
	public function UserList(){
		$UserData = UserModel::getUserAll();
		// var_dump($UserData);
		$this->assign('UserData',$UserData);
		return view();
	}
	public function UserAdd(){
		if (Request::instance()->isAjax()){
			//序列化数据转换数组
			parse_str(input("post.data"),$data);
			$res = UserModel::UserAdd($data);
			if ($res) {
				return true;
			}else{
				return false;
			}
		}
		return view();
	}
}