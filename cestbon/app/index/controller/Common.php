<?php
namespace app\index\controller;
use \think\Controller;
use \think\Db;
class Common extends Controller{
    public function _initialize(){
    	$list = Db::table('set')->order("id desc")->find();
    	$this->assign('list',$list);
    }
}
