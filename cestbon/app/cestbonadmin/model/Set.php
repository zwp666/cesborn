<?php
namespace app\cestbonadmin\model;
use \think\Exception;
use \think\Db;
use \think\Model;
/**
* 
*/
class Set extends Model{
	public static function getSetAll($num){
		$data = Db::table('set')->paginate($num);
		return $data;
	}
	public static function SetAdd($data){
		$res = Db::table('set')->insert($data);
		if ($res) {
			return 1;
		}else{
			return 0;
		}
	}
}