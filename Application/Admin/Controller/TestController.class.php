<?php
/*试题管理*/
namespace Admin\Controller;
//use Think\Controller;
use Org\Util\Page;

class TestController extends AdminController {

	/*试题列表*/
	public function index(){
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where="";
        if(isset($_GET["fileid"]) && isset($_GET["typeid"])){
            $fileid=$_GET["fileid"];
            $typeid=$_GET["typeid"];
            if($fileid != 5 && $typeid != 4){
                $where = "filetype = ".$fileid." and type = ".$typeid;
                if ($fileid == 2) {
                	$where .= " and `group` = ".session('group');
                }
            }
            else if($fileid == 5 && $typeid != 4){
            	$where = "type = ".$typeid;

            }
            else if($fileid != 5 && $typeid == 4){
            	$where = "filetype = ".$fileid;
            	if ($fileid == 2) {
                	$where .= " and `group` = ".session('group');
                }
            }
            else{
            	$where = "";
            }
        }
        //试题类型 公司制度、话术案例等
        $filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);
        //试题类型 选择、判断、简答题
        $questiontype = D("Questiontype");
        $questiontype_1 = $questiontype->select();
        $this->assign("questiontype",$questiontype_1);

        $question = D("Question"); //
        $count=$question->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="id,filetype,type,group,question,crtime,status";
        $list=$question->field($field)->where($where)->order('crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        //echo "<pre>";
        //var_dump($list);
        $this->display();
	}

	/*修改试题状态*/
	public function status(){
		if(isset($_POST["status"]) && isset($_POST["id"])){
			$where = "id='".$_POST["id"]."'";
			$question = D("Question");
			$status = $_POST["status"];
			switch ($status) {
				case 1:
					$question->status=0;
					$data["status"]=0;
					break;
				
				default:
					$question->status=1;
					$data["status"]=1;
					break;
			}
			$z=$question->where($where)->save();
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

	/*试题发布*/
	public function addtest(){

		//试题类型 公司制度、话术案例等
        $filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);
        //试题类型 选择、判断、简答题
        $questiontype = D("Questiontype");
        $questiontype_1 = $questiontype->select();
        $this->assign("questiontype",$questiontype_1);
		$this->display();
	}

	public function upload(){
		$filetype=$_POST["fileid"];
		$typeid=$_POST["typeid"];
		$content=$_POST["content"];
		$question=D("Question");

		$question->filetype=$filetype;
		$question->type=$typeid;
		$question->group = session('group');
		$question->question=$content;
		switch ($typeid) {
			case 1:
				$selectnumber=$_POST["shumu"];
				$answer=$_POST["select"];
				
				switch ($selectnumber) {
					case 4:
						$str =$_POST["select1"]."|".$_POST["select2"]."|".$_POST["select3"]."|".$_POST["select4"];
						break;
					case 3:
						$str =$_POST["select1"]."|".$_POST["select2"]."|".$_POST["select3"];
						break;
					case 2:
						$str =$_POST["select1"]."|".$_POST["select2"];
						break;
					default:
						$str =$_POST["select1"];
						break;
				}
				$question->selectnumber=$selectnumber;
				$question->select=$str;
				$question->answer=$answer;
				break;
			case 2:
				$question->answer=$_POST["panduan"];
				break;
			case 5:
				$selectnumber=$_POST["duoxuan"];
				$answer=$_POST["answer"];
				switch ($selectnumber) {
					case 4:
						$str =$_POST["select1"]."|".$_POST["select2"]."|".$_POST["select3"]."|".$_POST["select4"];
						break;
					case 3:
						$str =$_POST["select1"]."|".$_POST["select2"]."|".$_POST["select3"];
						break;
					case 2:
						$str =$_POST["select1"]."|".$_POST["select2"];
						break;
					default:
						$str =$_POST["select1"];
						break;
				}
				$question->selectnumber=$selectnumber;
				$question->select=$str;
				$question->answer=$answer;
				break;
			default:  /*3、简答题*/
				$question->answer=$_POST["answer"];
				break;
		}
		
		$z=$question->add();
		if($z){
			$this->success("试题添加成功！","index");
		}
		else{
			$this->error("试题添加失败！","index");
		}
	}


	/*编辑试题*/
	public function revisetest(){
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			$where = "id='".$id."'";
			$field="id,filetype,type,question,selectnumber,select,answer,status";
			$question=D("Question");
			$question_1=$question->field($field)->where($where)->find();
			$this->assign("question",$question_1);

			//试题类型 公司制度、话术案例等
		    $filetype = D("Filetype");
		    $filetype_1 = $filetype->select();
		    $this->assign("filetype",$filetype_1);
		    //试题类型 选择、判断、简答题
		    $questiontype = D("Questiontype");
		    $questiontype_1 = $questiontype->select();
		    $this->assign("questiontype",$questiontype_1);
			$this->display();
		}
		else{
			$this->error("错误，请重新点击","index");
		}
	}
	//编辑修改处理
	public function update(){
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$filetype=$_POST["fileid"];
			$typeid=$_POST["typeid"];
			$content=$_POST["content"];
			$question=D("Question");

			$question->filetype=$filetype;
			$question->type=$typeid;
			$question->question=$content;
			switch ($typeid) {
				case 1:
					$selectnumber=$_POST["shumu"];
					$answer=$_POST["select"];
					
					switch ($selectnumber) {
						case 4:
							$str =$_POST["select1"]."|".$_POST["select2"]."|".$_POST["select3"]."|".$_POST["select4"];
							break;
						case 3:
							$str =$_POST["select1"]."|".$_POST["select2"]."|".$_POST["select3"];
							break;
						case 2:
							$str =$_POST["select1"]."|".$_POST["select2"];
							break;
						default:
							$str =$_POST["select1"];
							break;
					}
					$question->selectnumber=$selectnumber;
					$question->select=$str;
					$question->answer=$answer;
					break;
				case 2:
					$question->answer=$_POST["panduan"];
					break;
				case 5:
					$selectnumber=$_POST["duoxuan"];
					$answer=$_POST["answer"];
					switch ($selectnumber) {
						case 4:
							$str =$_POST["select1"]."|".$_POST["select2"]."|".$_POST["select3"]."|".$_POST["select4"];
							break;
						case 3:
							$str =$_POST["select1"]."|".$_POST["select2"]."|".$_POST["select3"];
							break;
						case 2:
							$str =$_POST["select1"]."|".$_POST["select2"];
							break;
						default:
							$str =$_POST["select1"];
							break;
					}
					$question->selectnumber=$selectnumber;
					$question->select=$str;
					$question->answer=$answer;
					break;
				default:  /*3*/
					$question->answer=$_POST["answer"];
					break;
			}
			
			$z=$question->where("id=$id")->save();
			if($z){
				$this->success("试题修改成功！","index");
			}
			else{
				$this->error("试题修改失败！","revisetest?id=$id");
			}

		}
		else {
			$this->error("修改未成功，请重新修改","index");
		}
	}
}