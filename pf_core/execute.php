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

class execute{
	public $controller;
	public $task; 
	public function __construct(){
	
	}
	public function display(){
		//distinguish background and application/区分后台与应用
		if(strstr($_SERVER['HTTP_HOST'],'os')!=false){
			// os.pandoraf.com
			require ROOT.'/pf_admin/index.php';
		}else{
			//www.pandoraf.com
			require ROOT.'/applications/pandoraf/index.php';
		}		
	}
		
}
?>