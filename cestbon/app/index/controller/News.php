<?php
namespace app\index\controller;
use \think\Controller;
use \think\Db;
class News extends Common{
    public function News(){
    	$data = Db::table('news')->where("id",15)->find();
    	$this->assign('data',$data);
    	return view();
    }
}
