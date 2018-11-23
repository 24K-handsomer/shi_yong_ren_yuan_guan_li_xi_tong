<?php
namespace NotKefu\Controller;

use Org\Util\Page;
/**
* 朋友圈展示
*/
class FriendController extends NotkefuController
{
	/*朋友圈展示*/
	public function index(){
        $p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where="filetype = 7 and `group` = ".session("group");
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
}