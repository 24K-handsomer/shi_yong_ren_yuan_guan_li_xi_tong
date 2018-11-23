<?php
namespace Kefu\Controller;
//use Think\Controller;
use Org\Util\Page;
/**
* 话术案例
*/
class SpeechcaseController extends KefuController
{
	
	/*话术案例培训资料列表展示*/
	public function index(){
        $p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        //$where="filetype = 4 and `group` = ".session("group");
        $where = "id in (".session('speechcase').")";
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
	public function showfile() {
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


    //话术对练
    public function talking() {

        $this->display();
        
    }

}