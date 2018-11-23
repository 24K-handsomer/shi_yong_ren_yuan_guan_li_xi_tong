<?php
namespace Kefu\Controller;
//use Think\Controller;
use Org\Util\Page;
/**
* 公司制度
*/
class ComsysController extends KefuController
{
	
	/*公司制度培训资料列表展示*/
	public function index(){
        $p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='filetype=1';
        $filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);

        $file = D("file");
        $count=$file->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="id,title,author,filetype,createtime";
        $filelist=$file->field($field)->where($where)->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("filelist",$filelist);
        $this->display();
	}

	//显示一篇文章的具体内容
	public function showfile(){

		if(isset($_GET["id"])){
            $where="id='".$_GET["id"]."'";
            $file = D("file");
            $field="id,title,author,filetype,content,createtime";
            $showfile=$file->field($field)->where($where)->find();
            $this->assign("showfile",$showfile);
            $this->display();
        }
        else{
            $this->error("抱歉，出现错误！",U("index"));
        }
	}


    //试卷展示
    public function paperlist(){
        $p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where = "pid in (".session('test1').")";
        $field = "pid,pname";
        $paper = D("Paper");

        $count=$paper->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();
        $this->assign("show",$show);

        $attr = $paper->field($field)->where($where)->order('crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign("list",$attr);
        $this->display();
    }


    //试卷开始测试
    public function paperstart() {
        if(isset($_GET['id'])) {
            $where = "pid = ".$_GET["id"];
            $field = "pid,filetype,pname,quid,type1,type2,type3,type5";
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
            $this->error("抱歉，出现错误！","paperlist");
        }
    }


    //添加分数
    public function addgrade(){
        if(POST){
            $str = "";
            $jianda = D("Jianda");
            for ($i=0; $i < 100; $i++) { 
                $name = "name"."$i";
                $val = "val"."$i";
                if (isset($_POST[$name])) {
                    $jianda->qid = $_POST[$name];
                    $jianda->qanswer = $_POST[$val];
                    $z = $jianda->add();
                    $str .= $z.",";
                }
                else{
                    break;
                }
            }
            $str = substr($str,0,strlen($str)-1);

            $isgrade2 = 0;
            if($str == ""){
                $str = 0;
                $isgrade2 = 1;
            }

            $grade = D("Grade");
            $grade->group = session("group");
            $grade->uname = session("uname");
            $grade->filetype = $_POST["filetype"];
            $grade->pname = $_POST["pname"];
            $grade->grade1 = $_POST["grade"];
            $grade->grade2 = $str;
            $grade->isgrade2 = $isgrade2;
            $grade->grade = $_POST["grade"];
            $re = $grade->add();
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