<?php
namespace app\cestbonadmin\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;
use \think\Auth as auth;
use \app\cestbonadmin\model\User as UserModel ;
/**
* 
*/
class Common extends Controller{
	public function _initialize(){
		if (!Session::has('uname')){
				$this->redirect('login/login');
			}
		// 	else{
		// 	$uid = session('uid');
		// 	$auth = new auth();
		// 	$state = UserModel::getUserOne($uid);
		// 	$request = request::instance();
		// 	$con=$request->controller();          
		// 	$act=$request->action();
		//     $name = $con.'/'.$act;
		//     $res = $auth -> check($name,$uid);
		//     if(!$res || $state==0){
		//         echo "<script>alert('无权限');location.href='".url('cestbonadmin/index/welcome')."'</script>";
		//     }
		// }
	}
}