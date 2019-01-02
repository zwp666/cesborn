<?php
namespace app\cestbonadmin\model;
use \think\Exception;
use \think\Db;
use \think\Model;
/**
* 
*/
class News extends Model{
	public static function getNewsAll($num){
		$list = Db::table('news')->paginate($num);
		return $list;
	}
	public static function NewsAdd($data){
		$res = Db::table('news')->insert($data);
		return $res;
	}
}