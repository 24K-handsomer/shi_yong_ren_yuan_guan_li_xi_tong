<?php
/**
* 人员管理
*/
namespace Admin\Controller;
//use Think\Controller;
use Org\Util\Page;
class PeomanagerController extends AdminController
{
	public function index(){
		$group = D("Group");
    	$attr=$group->select();
    	$this->assign("grouplist",$attr);

    	$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='u_role_id = 1';
        if(isset($_GET["uname"]) && (strlen($_GET["uname"]) !=0) ){
            $uname=$_GET["uname"];
            $where .= " and uname='".$uname."'";
        }

        $user = D("User"); 
        $count=$user->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="uid,uname,pwd,group,crtime";
        $list=$user->field($field)->where($where)->order('status desc,crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);

		$this->display();
	}

	//添加新部门小组、
	public function addgroup() {
		if(isset($_POST["name"])){
			$name = $_POST["name"];
			$group = D("Group");
			$group->group_name = $name;
			$z = $group->add();
			if($z){
				$data["z"]=1;
				$data["id"]=$z;
				$data["name"]=$name;
				$this->ajaxReturn($data);
				
			}
			else{
				$data["z"]=0;
				$this->ajaxReturn($data);
				
			}
			
		}
		else{
			$data["z"]=2;
			$this->ajaxReturn($data);
			
		}
	}


	//添加新人员
	function addpeople(){

		if (isset($_POST['uname']) && isset($_POST['role'])) {
            $uname = $_POST['uname'];
            $pwd = $_POST['pwd'];
            $group = $_POST['group'];
            $role = $_POST['role'];

            $user = D("User"); 
        	
            
            $user = D("User");
            $where = "uname = '".$uname."' and status = 1";
            $count=$user->where($where)->count();
            if ($count == 0) {
            	$user->uname = $uname;
	            $user->pwd = $pwd;
	            $user->group = $group;
	            $user->u_role_id = $role;
	            $z = $user->add();
	            if ($z) {
	                $this->success("添加成功！",U("Person/index"));
	            }
	            else {
	                $this->error("更改错误！","index");
	            }
            }
            else{
            	$this->error("已经有该名字！！！","index");
            }
            
        }
        else {
            $this->error("抱歉，后台未接收到传出去的值！","index");
        }
	}
}