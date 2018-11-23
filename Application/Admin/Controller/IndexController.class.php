<?php
namespace Admin\Controller;
//use Think\Controller;
use Org\Util\Page;
class IndexController extends AdminController {
    //文件资料添加提交
    public function index(){
    	$filetype=D("Filetype");
    	$filetype_1=$filetype->select();
    	$this->assign("filetype",$filetype_1);
        $this->display();
    }
    //文件资料添加提交后台
    public function upload(){
        if($_POST['content'] && $_POST['content']!=''){
            $title=$_POST["title"];
            $author=$_POST["author"];
            $filetype=$_POST["filetype"];
            $content=$_POST["content"];

            $file=D("File");
            $file->title=$title;
            $file->author=$author;
            $file->filetype=$filetype;
            $file->group = session('group');
            $file->content=$content;
            $z=$file->add();
            if($z){
                $this->success("文章发布成功！",U("filelist"));  //2017-4-10 18:07修改此处
            }
            else{
                $this->success("发布失败！","index");
            }

        }
        else{
            $this->error("请完善提交内容！","index");
        }
    	
    }


    //文件资料列表
    public function filelist(){
        $p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $where='';
        if(isset($_GET["fileid"])){
            $fileid=$_GET["fileid"];
            $where="filetype='".$fileid."'";
            if($fileid == 2){
                $where .= " and `group` = ".session("group");
            }
            if($fileid == 5){
                $where = '';
            }
            
        }
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


    //查看文件资料
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
            $this->error("抱歉，出现错误！",U("filelist"));
        }
    }


    //修改文件资料前端展示
    public function updatefile(){
        if(isset($_GET["id"])){
            $where = "id='".$_GET["id"]."'";
            $field = "id,title,author,filetype,content";
            $file = D("file");
            $updatefile = $file->field($field)->where($where)->find();
            $this->assign("file",$updatefile);

            $filetype = D("Filetype");
            $filetype_1 = $filetype->select();
            $this->assign("filetype",$filetype_1);

            $this->display();

        }
        else{
            $this->error("抱歉，出现错误！",U("filelist"));
        }
    }
    //修改文件资料后台提交
    public function update(){
        $id=$_POST["id"];

        if($_POST['content'] && $_POST['content']!=''){
            $where="id='".$id."'";
            $file=D("File");
            $file->title=$_POST["title"];
            $file->author=$_POST["author"];
            $file->filetype=$_POST["filetype"];
            $file->content=$_POST["content"];
            $z=$file->where($where)->save();
            if($z){
                $this->success("文章修改成功！",U("showfile?id=$id"));
            }
            else{
                $this->error("文章修改失败！",U("updatefile?id=$id"));
            }

        }
        else{
            $this->error("请完善提交内容！",U("updatefile?id=$id"));
        }
    }


    //删除文件资料
    public function deletefile(){
        if(isset($_GET["id"])){
            $where="id='".$_GET["id"]."'";
            $file = D("file");
            $z=$file->where($where)->delete();
            if($z){
                $this->success("删除成功！",U("filelist"));
            }
            else{
                $this->error("删除失败！",U("filelist"));
            }
        }
        else{
            $this->error("抱歉，出现错误！",U("filelist"));
        }
    }
}