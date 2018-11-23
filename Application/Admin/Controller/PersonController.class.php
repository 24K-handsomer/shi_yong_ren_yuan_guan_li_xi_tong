<?php
/*实习客服管理*/
namespace Admin\Controller;
//use Think\Controller;
use Org\Util\Page;

class PersonController extends AdminController
{	
	//实习客服列表
	public function index(){
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='u_role_id = 2';
        if(isset($_GET["uname"]) && (strlen($_GET["uname"]) !=0) ){
            $uname=$_GET["uname"];
            $where .= " and uname='".$uname."'";
        }
        $group = D("Group");
        $attr = $group->select();
        $this->assign("grouplist",$attr);

        $user = D("User"); 
        $count=$user->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="uid,uname,pwd,group,test1,proknowledge,test2,sellskills,test3,speechcase,practice,friend,crtime,status,isexam";
        $list=$user->field($field)->where($where)->order('status desc,crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display();
	}

	//通过部门小组搜索实习客服列表
	public function selectgroup(){
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='u_role_id = 2';
        if(isset($_GET["group"])){
            $group=$_GET["group"];
            $where .= " and `group` = ".$group;
        }
        $group = D("Group");
        $attr = $group->select();
        $this->assign("grouplist",$attr);

        $user = D("User"); 
        $count=$user->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="uid,uname,pwd,group,test1,proknowledge,test2,sellskills,test3,speechcase,practice,friend,crtime,status";
        $list=$user->field($field)->where($where)->order('status desc,crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display("index");
	}


	//非客服实习人员列表
	public function notkefuindex(){
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='u_role_id = 3';
        if(isset($_GET["uname"]) && (strlen($_GET["uname"]) !=0) ){
            $uname=$_GET["uname"];
            $where .= " and uname='".$uname."'";
        }
        $group = D("Group");
        $attr = $group->select();
        $this->assign("grouplist",$attr);

        $user = D("User"); 
        $count=$user->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="uid,uname,pwd,group,test1,crtime,status,isexam";
        $list=$user->field($field)->where($where)->order('status desc,crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display();
	}

	//通过部门小组搜索非客服实习人员列表
	public function notkefuselectgroup(){
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='u_role_id = 3';
        if(isset($_GET["group"])){
            $group=$_GET["group"];
            $where .= " and `group` = ".$group;
        }
        $group = D("Group");
        $attr = $group->select();
        $this->assign("grouplist",$attr);

        $user = D("User"); 
        $count=$user->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="uid,uname,pwd,group,test1,crtime,status";
        $list=$user->field($field)->where($where)->order('status desc,crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display("notkefuindex");
	}


	/*修改人员状态*/
	public function status(){
		if(isset($_POST["status"]) && isset($_POST["id"])){
			$where = "uid='".$_POST["id"]."'";
			$User = D("User");
			$status = $_POST["status"];
			switch ($status) {
				case 1:
					$User->status=0;
					$data["status"]=0;
					break;
				
				default:
					$User->status=1;
					$data["status"]=1;
					break;
			}
			$z=$User->where($where)->save();
			if($z){
				$data["z"]=1;
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


	/*产品知识、销售技巧、话术案例、朋友圈展示等开通关闭*/
	public function chang(){
		if (isset($_POST["id"]) && isset($_POST["keyname"]) && isset($_POST["keyvalue"])) {
			$uid = $_POST["id"];
			$keyname = $_POST["keyname"];
			$keyvalue = $_POST["keyvalue"];

			$where = "uid='".$uid."'";
			$User = D("User");
			switch ($keyvalue) {
				case 1:
					$User->$keyname = 0;
					$data["keyvalue"] = 0;
					break;
				
				default:
					$User->$keyname = 1;
					$data["keyvalue"] = 1;
					break;
			}
			$z=$User->where($where)->save();
			if ($z) {
				$data["z"]=1;
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


	/*修改话术对练功能状态*/
	public function practice(){
		if(isset($_POST["practice"]) && isset($_POST["id"])){
			$where = "uid='".$_POST["id"]."'";
			$User = D("User");
			$practice = $_POST["practice"];
			switch ($practice) {
				case 1:
					$User->practice=0;
					$data["practice"]=0;
					break;
				
				default:
					$User->practice=1;
					$data["practice"]=1;
					break;
			}
			$z=$User->where($where)->save();
			if($z){
				$data["z"]=1;
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


	//弹窗 试卷
	public function select(){
		if(isset($_GET['name']) && isset($_GET['test'])){
			$name = $_GET['name'];
			$test = $_GET['test'];
			switch ($name) {
				case 'test1':
					$where = "filetype = 1 and status = 1";
					break;
				case 'test2':
					$where = "filetype = 2 and `group` = ".session('group')." and status = 1";
					break;
				default:  //test3
					$where = "filetype = 3 and `group` = ".session('group')." and status = 1";
					break;
			}
			$field = "pid,pname";
			$paper = D("Paper");
			$attr = $paper->field($field)->where($where)->order('crtime desc')->select();
			$this->assign("list",$attr);
			$this->assign("zhong",$test);
			$this->display();
		}
		else{
			$this->error("发生错误！");
		}
	}



	//弹窗显示文章列表
	public function selectfile(){
		if(isset($_GET['name']) && isset($_GET['test'])){
			$name = $_GET['name'];
			$test = $_GET['test'];
			switch ($name) {
				case 'proknowledge':
					$where = "filetype = 2 and `group` = ".session('group');
					break;
				case 'sellskills':
					$where = "filetype = 3 and `group` = ".session('group');
					break;
				case 'speechcase':
					$where = "filetype = 4 and `group` = ".session('group');
					break;
				default:  //friend
					$where = "filetype = 7 and `group` = ".session('group');
					break;
			}
			$field = "id,title";
			$file = D("File");
			$attr = $file->field($field)->where($where)->order('createtime desc')->select();
			$this->assign("list",$attr);
			$this->assign("zhong",$test);
			$this->display();
		}
		else{
			$this->error("发生错误！");
		}
	}




	//修改test字段名称(将选择的试卷id添加到user表各test字段中)
	public function addtest(){
		
		if(isset($_POST["uid"]) && isset($_POST["zd"]) && isset($_POST["test"])){
			$uid = $_POST["uid"];
			$zd = $_POST["zd"];
			$test = $_POST["test"];

			$where = "uid='".$uid."'";
			$User = D("User");
			$User->$zd = $test;
			$z=$User->where($where)->save();
			if($z){
				$data["z"]=1;
				$data["test"]=$test;
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

	//成绩列表
	public function gradelist(){
		
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='';
        if(isset($_GET["uname"]) && (strlen($_GET["uname"]) != 0)){
            $uname=$_GET["uname"];
            $where = "uname='".$uname."'";
        }

        $group = D("Group");
        $attr = $group->select();
        $this->assign("grouplist",$attr);

        $filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);

        $grade = D("Grade"); 
        $count=$grade->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="gid,uname,filetype,pname,grade1,grade2,isgrade2,grade";
        $list=$grade->field($field)->where($where)->order('crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display();

	}

	//成绩列表-通过部门小组搜索
	public function gradelistgroup(){
		
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='';
        if(isset($_GET["group"])){
            $group=$_GET["group"];
            $where = "`group` = ".$group;
        }

        $group = D("Group");
        $attr = $group->select();
        $this->assign("grouplist",$attr);

        $filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);

        $grade = D("Grade"); 
        $count=$grade->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="gid,uname,filetype,pname,grade1,grade2,isgrade2,grade";
        $list=$grade->field($field)->where($where)->order('crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display("gradelist");

	}


	//批改简答题
	public function gradeselect(){
		if(isset($_GET['grade2'])){
			$grade2 = $_GET['grade2'];
			$where = "jid in (".$grade2.")";
			$field = "jid,qid,qanswer";
			$jianda = D("Jianda");
			$attr = $jianda->field($field)->where($where)->select();
			$this->assign("list",$attr);
			//var_dump($attr);
			
			$question = D("Question");
			$attr1 = $question->field("id,question,answer")->where("type = 3")->order("crtime desc")->select();
			$this->assign("question",$attr1);
		
			$this->display();
		}
		else{
			$this->error("发生错误！");
		}
	}


	//批改成绩单grade2简答题答案
	public function updategrade2(){
		if (isset($_POST['gid']) && isset($_POST['grade2'])) {
			$where = "gid = ".$_POST['gid'];
			$grade2 = $_POST['grade2'];

			$grade = D("Grade");
			$grade1 = $grade->field("grade1")->where($where)->find();
			
			$grade->grade2 = $_POST['grade2'];
			$grade->isgrade2 = 1;
			$grade->grade = $grade2 + $grade1['grade1'];
			$re = $grade->where($where)->save();
			if ($re) {
				$data["z"] = 1;
				$this->ajaxReturn($data);
			}
			else{
				$data["z"] = 0;
				$this->ajaxReturn($data);
			}
		}
		else{
			$data["z"] = 2;
			$this->ajaxReturn($data);
		}
	}



	//设置某个人的成长任务
	public function task(){
		if (isset($_GET["id"])) {
			$where = "uid = ".$_GET["id"];
			$field = "uid,uname,task7,task14,task21,task30";
			$user = D("User");
			$attr = $user->field($field)->where($where)->find();
			$this->assign("task",$attr);
			$this->display();
		}
		else{
			$this->error("抱歉，后台未接收到传出去的值！");
		}
	}

	//添加个人任务
	public function addtask(){
		if (isset($_POST['uid'])) {
			$uid = $_POST['uid'];
			$where = "uid = ".$uid;
			$user = D("User");
			$user->task7 = $_POST['7task'];
			$user->task14 = $_POST['14task'];
			$user->task21 = $_POST['21task'];
			$user->task30 = $_POST['30task'];
			if (isset($_POST['start']) && ($_POST['start'] == 1)) {
				$user->taskstart = date("Y-m-d H:i:s");
			}
			$z = $user->where($where)->save();
			if ($z) {
				$this->success("任务添加成功！","task?id=$uid");
			}
			else {
				$this->error("任务添加失败！","task?id=$uid");
			}

		}
		else{
			$this->error("抱歉，后台未接收到传出去的值！");
		}
	}


	//与实习客服对练
	public function talking(){
		$this->display();
	}


}