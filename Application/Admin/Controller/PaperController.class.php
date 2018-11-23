<?php
/*试题管理*/
namespace Admin\Controller;
//use Think\Controller;
use Org\Util\Page;

/**
* 试卷管理
*/
class PaperController extends AdminController
{
	
	//试卷列表
	public function index(){
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where="";
        if(isset($_GET["fileid"])){
            $fileid=$_GET["fileid"];
            $where="filetype = ".$fileid;
            if($fileid == 2) {
            	$where .= " and `group` = ".session('group');
            }
            if($fileid == 5){
                $where = "";
            }
        }

        //试题类型 公司制度、话术案例等
        $filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);

        $paper = D("Paper"); 
        $count=$paper->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="pid,pname,filetype,crtime,status";
        $list=$paper->field($field)->where($where)->order('crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display();

	}


	/*修改试题状态*/
	public function status(){
		if(isset($_POST["status"]) && isset($_POST["id"])){
			$where = "pid='".$_POST["id"]."'";
			$paper = D("Paper");
			$status = $_POST["status"];
			switch ($status) {
				case 1:
					$paper->status=0;
					$data["status"]=0;
					break;
				
				default:
					$paper->status=1;
					$data["status"]=1;
					break;
			}
			$z=$paper->where($where)->save();
			if($z){
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

	//试卷添加前端显示
	public function addpaper(){
		//试题类型 公司制度、话术案例等
        $filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);
        $this->display();
	}
	//试卷添加--弹窗
	public function select(){
		if(isset($_GET['filetype']) && isset($_GET['type'])){
			$filetype = $_GET['filetype'];
			$type = $_GET['type'];
			$where = "filetype = ".$filetype." and type = ".$type." and status = 1";
			if ($filetype == 2) {
				$where .= " and `group` = ".session('group');
			}
			$field = "id,question";
			$question = D("Question");
			$attr = $question->field($field)->where($where)->order('crtime desc')->select();
			$this->assign("list",$attr);
			$this->display();
		}
		else{
			$this->error("发生错误！","addpaper");
		}
	}
	//试卷添加--后台处理
	public function upload(){
		if( (strlen($_POST["type1"])!=0) || (strlen($_POST["type2"])!=0) || (strlen($_POST["type5"])!=0) || (strlen($_POST["type3"])!=0) ){
			$paper = D("Paper");
			$paper->filetype = $_POST["fileid"];
			$paper->group = session('group');
			$paper->pname = $_POST["pname"];
			$str = "";
			if(strlen($_POST["type1"])!=0){
				$paper->type1 = $_POST["type1"];
				$str .= $_POST["type1"].",";
			}
			if(strlen($_POST["type2"])!=0){
				$paper->type2 = $_POST["type2"];
				$str .= $_POST["type2"].",";
			}
			if(strlen($_POST["type3"])!=0){
				$paper->type3 = $_POST["type3"];
				$str .= $_POST["type3"].",";
			}
			if(strlen($_POST["type5"])!=0){
				$paper->type5 = $_POST["type5"];
				$str .= $_POST["type5"].",";
			}
			$str = substr($str,0,strlen($str)-1);
			$paper->quid = $str; 
			$z = $paper->add();
			if($z){
				$this->success("新试卷成功诞生了！","index");
			}
			else{
				$this->error("抱歉，出现错误！","addpaper");
			}
		}
		else{
			$this->error("抱歉，出现错误！","addpaper");
		}
		
	}



	//查看试卷
	public function showpaper(){
		if(isset($_GET["id"])){
			$where = "pid = ".$_GET["id"];
			$field = "pid,pname,quid,type1,type2,type3,type5";
			$paper = D("Paper");
			$attr = $paper->field($field)->where($where)->find();
			$this->assign("paper",$attr);
			//$id = $attr['quid'];
			$quwhere1 = "id in (".$attr['type1'].") and status = 1";
			$quwhere2 = "id in (".$attr['type2'].") and status = 1";
			$quwhere3 = "id in (".$attr['type3'].") and status = 1";
			$quwhere5 = "id in (".$attr['type5'].") and status = 1";
			$qufield = "id,question,selectnumber,select,answer";
			$question = D("Question");

			$list1 = $question->field($qufield)->where($quwhere1)->select();
			$this->assign("list1",$list1);

			$list2 = $question->field($qufield)->where($quwhere2)->select();
			$this->assign("list2",$list2);

			$list3 = $question->field($qufield)->where($quwhere3)->select();
			$this->assign("list3",$list3);

			$list5 = $question->field($qufield)->where($quwhere5)->select();
			$this->assign("list5",$list5);

			/*echo "<pre>";
			var_dump($list1);
			echo "</pre>";*/
			$this->display();
		}
		else{
			$this->error("错误，请重新点击！","index");
		}
	}
	
}