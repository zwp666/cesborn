<?php
namespace app\cestbonadmin\model;
use \think\Exception;
use \think\Db;
use \think\Model;
/**
* 
*/
class User extends Model{
	public static function getUserAll(){
		$list = Db::table('user')->select();
		return $list;
	}
	public static function getUserOne($uid){
		$data = Db::table('user')->where("uid",$uid)->find();
		$state = $data['state'];
		return $state;	
	}
	public static function UserAdd($data){
		$uname = $data['username'];
		$password = md5(md5($data['pass']));
		$state = $data['state'];
		$register = time();
		$data = [
				'uname' => $uname,
				'password' => $password,
				'state' => $state,
				'register_time' => $register,
		];
		$res = Db::table('user')->insert($data);
		return $res;
	}

	public static function UserState($uid){
		$lastlogin_time = time();
		$lastlogin_ip = get_ip();
		$res = Db::table('user')->where('uid', $uid)->update(['lastlogin_time' => $lastlogin_time,'lastlogin_ip' => $lastlogin_ip]);
	}
}