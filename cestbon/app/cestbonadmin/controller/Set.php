<?php
namespace app\cestbonadmin\controller;
use \app\cestbonadmin\model\Set as SetModel ;
use \think\Request;

/**
* @网站信息设置
*/
class Set extends Common{
	public function SetList($num="3"){
		$SetData = SetModel::getSetAll($num);
		$this->assign('SetData',$SetData);
		return view();
	}

	//文件上传
	public function SetImgAdd(){
		//获取上传的图片信息
	    $file = request()->file('setimg');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    if($file){
	        $info = $file->move("./static/uploads");
	        if($info){
	            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	            echo $info->getSaveName();
	        }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	        }
    	}
	}

	public function SetAdd(){
		if (Request::instance()->isAjax()){
			//序列化数据转换数组
			parse_str(input("post.data"),$data);
			$res = SetModel::SetAdd($data);
			return $res;
		}
		return view();
	}


}