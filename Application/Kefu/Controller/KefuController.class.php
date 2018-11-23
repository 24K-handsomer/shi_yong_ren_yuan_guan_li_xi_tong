<?php
namespace Kefu\Controller;
use Think\Controller;

class KefuController extends Controller {

	function _initialize(){

		//parent::_construct();

		//$nowac=CONTROLLER_NAME."-".ACTION_NAME;

		//$u_name=session("u_name");
		//$auth_ac=session("auth_ac");

		//$allowac="Showproject-index,Addproject-index,Shownews-index,Add-index,Messzct-index,Messzct-messpro,Showuser-index,Auth-index";
		
		// && strpos($allowac,$nowac)===false && $u_name!=="admin%"
		/*if(strpos($auth_ac,$nowac)===false){
			exit("没有访问权限！！！");
		}*/

		if (!session('uname')) {
			$this->error("你还没有登录！",R('Home/Index'));
		}
		$panisexam = new \Home\Model\UserModel();
		$re = $panisexam->panisexam();
		if (!$re) {
			session(null);
			$this->error("已经登录，正在进行考试！",U('Home/Index/index'));
		}
	}
}