<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Page;
class AdminController extends Controller {

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

		
	}


	public function isexam(){
		if (POST) {
            $uid = $_POST["uid"];
            $where = "uid = ".$uid;
            $user = D("User");
            $user->isexam = 0;
            $re = $user->where($where)->save();
            if($re) {
                $data["z"]=1;
                $this->ajaxReturn($data);
                exit;
            }
            else{
                $data["z"]=0;
                $this->ajaxReturn($data);
                exit;
            }
            
        }
        else{
            $data["z"]=2;
            $this->ajaxReturn($data);
            exit;
        }
	} 
}