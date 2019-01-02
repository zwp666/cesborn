<?php
namespace app\cestbonadmin\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;
use \app\cestbonadmin\model\User as UserModel ;
/**
* 
*/
class Login extends Controller{
	public function login(){
		if (Request::instance()->isAjax()) {
			$uname = $_POST['uname'];
			$password = md5(md5($_POST['password']));
			$data = [
				'uname' => $uname,
				'password' => $password,
			];
			$res = Db::table('user')->where($data)->find();
			if ($res) {
				Session::set('uname',$res['uname']);
				Session::set('uid',$res['uid']);
				if (Session::has('uname')) {
					$uid = session('uid');
					$res = UserModel::UserState($uid);
				}
				return 1;
			}else{
				return 0;	
			}
		}else{
			return view();
		}
	}

	public function loginout(){
		Session::delete('uname');
		$this->redirect('cestbonadmin/login/login');
	}
}