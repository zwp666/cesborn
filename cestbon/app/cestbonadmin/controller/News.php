<?php
namespace app\cestbonadmin\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use \app\cestbonadmin\model\News as NewsModel;
/**
* 
*/
class News extends Common{
	public function NewsList($num="10"){
		$NewsData = NewsModel::getNewsAll($num);
		$this->assign('NewsData',$NewsData);
		return view();
	}

	public function LayImgUpload(){
        $file = Request::instance()->file('file');
        if(empty($file)){
            $result["code"] = "1";
            $result["msg"] = "请选择图片";
            $result['data']["src"] = '';
        }else{
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move("./static/uploads");
            if($info){
            	$name = $info->getSaveName();
                //成功上传后 获取上传信息
                $result["code"] = '0';
                $result["msg"] = "上传成功";
                $result['data']["src"] = "\static/uploads/".$name;
                $result['data']["title"] = $name;
            }else{
                // 上传失败获取错误信息
                $result["code"] = "2";
                $result["msg"] = "上传出错";
                $result['data']["src"] ='';
            }
        }
        return json_encode($result);
    }


	public function NewsAdd(){
		if (Request::instance()->isAjax()){
			//序列化数据转换数组
			parse_str(input("post.data"),$data);
			$res = NewsModel::NewsAdd($data);
			if ($res) {
				return true;
			}else{
				return false;
			}
		}
		return view();
	}
}