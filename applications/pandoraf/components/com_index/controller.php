<?php
//-+---------------------------------------------------------------------------------------------+
//   A Simple and Innovative PHP Framework about Foreign Trade E-commerce @2015-07-01 Version 1.0
//   一个简单和创新的PHP框架，为外贸电子商务开发， 始于中国共产党建党日,7月1日，版本1.0
//-+---------------------------------------------------------------------------------------------+
//   Update from/更新地址@https://github.com/HollenMok/pandoraf_v1.0
//-+---------------------------------------------------------------------------------------------+
//   Display on/项目效果展示地址 @http://www.pandoraf.com
//-+---------------------------------------------------------------------------------------------+
//   Apache License/开源许可协议 @http://www.apache.org/licenses/LICENSE-2.0
//-+---------------------------------------------------------------------------------------------+
//   Document support multi-language, aim to invite people worldwide join this project
//   文档目标是支持多语言，让全世界的人有机会了解并参加设计这个项目，目前只支持中文与英语。
//-+---------------------------------------------------------------------------------------------+
class IndexController{
	public function __construct(){
		//Smarty engine/Smarty 引擎
		require ROOT.'/pf_core/smarty/libs/Smarty.class.php';
		$smarty = new Smarty();
		$email = '461836320@qq.com';
		$smarty->assign('email',$email);
		$smarty->display('web/display/index.html');exit;
	}
	public function recommendation(){
		echo 'wake up pandoraf index!';
	}
	public function display(){
		echo 'back home pandoraf!';
	}
	
}