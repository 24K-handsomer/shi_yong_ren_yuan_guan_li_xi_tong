<?php
namespace Kefu\Controller;
//use Think\Controller;
use Org\Util\Page;
/**
* 成长任务 
*/
class GrowthController extends KefuController
{
	
	//成绩展示
	public function gradelist(){
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        $filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);

        $where="uname = '".session('uname')."'";

        $grade = D("Grade");
        $count=$grade->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="gid,uname,filetype,pname,grade1,grade2,isgrade2,grade,crtime";
        $list=$grade->field($field)->where($where)->order('crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display();

	}

	//实习客服填单量列表
	public function orderlist(){
		$p=1;
        if(isset($_GET["p"])){
            $p=$_GET["p"];
        }
        $this->assign("p",$p);

        /*$filetype = D("Filetype");
        $filetype_1 = $filetype->select();
        $this->assign("filetype",$filetype_1);*/

        $where="uid = ".session('uid');

        $order = D("Order");
        $count=$order->where($where)->count();
        $limit=10;
        $this->assign("limit",$limit);
        $page=new Page($count,$limit);
        $show=$page->show();

        $field="oid,money,biaoji,crtime";
        $list=$order->field($field)->where($where)->order('crtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("show",$show);
        $this->assign("list",$list);
        $this->display();
	}



	//添加订单
	public function addorder(){
		if (isset($_POST["money"]) && isset($_POST["biaoji"])) {
			$biaoji = "";
			if (strlen($_POST["biaoji"]) != 0) {
				$biaoji = $_POST["biaoji"];
			}
			$order = D("Order");
			$order->money = $_POST["money"];
			$order->biaoji = $biaoji;
			$order->uid = session("uid");
			$order->uname = session("uname");
			$z = $order->add();
			if ($z) {
				$this->success("添加成功！","orderlist");
			}
			else{
				$this->error("添加失败！","orderlist");
			}
		}
		else{
			$this->error("需要传递的值没到达服务器！","orderlist");
		}
	}


	//删除订单
	public function deleteorder()
	{
		if (isset($_POST["oid"])) {
			$where = "oid = ".$_POST["oid"];
			$order = D("Order");
			$z = $order->where($where)->delete();
			if ($z) {
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


	//任务展示
	public function taskshow(){
		if (isset($_GET['uid'])) {
			$where = "uid = ".$_GET['uid'];
			$field = "task7,task14,task21,task30,taskstart";
			$user = D("User");
			$attr = $user->field($field)->where($where)->find();
			$this->assign("task",$attr);

			$start = $attr['taskstart'];
			$end7 = date("Y-m-d H:i:s",strtotime("$start +1 week"));
			$end14 = date("Y-m-d H:i:s",strtotime("$start +2 week"));
			$end21 = date("Y-m-d H:i:s",strtotime("$start +3 week"));
			$end30 = date("Y-m-d H:i:s",strtotime("$start +1 month"));
			$now = date("Y-m-d H:i:s");

			$where7 = $where." AND (crtime BETWEEN '".$start."' AND '".$end7."')";
			$where14 = $where." AND (crtime BETWEEN '".$start."' AND '".$end14."')";
			$where21 = $where." AND (crtime BETWEEN '".$start."' AND '".$end21."')";
			$where30 = $where." AND (crtime BETWEEN '".$start."' AND '".$end30."')";
			$wherenow = $where." AND (crtime BETWEEN '".$start."' AND '".$now."')";

			$order = D("Order");
			$sum7 = $order -> where($where7) -> sum('money');
			$this->assign("sum7",$sum7);

			$sum14 = $order -> where($where14) -> sum('money');
			$this->assign("sum14",$sum14);

			$sum21 = $order -> where($where21) -> sum('money');
			$this->assign("sum21",$sum21);

			$sum30 = $order -> where($where30) -> sum('money');
			$this->assign("sum30",$sum30);

			$sumnow = $order -> where($wherenow) -> sum('money');
			$this->assign("sumnow",$sumnow);

			$this->display();

			//$this->show($sum30);
		}
		else{
			$this->show("未有任务！");
		}
	}
}