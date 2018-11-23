<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class IndexController extends Controller {


	//登录界面
    public function index(){
        session(null);
        $group = D("Group");
        $attr = $group->select();
        $this->assign("grouplist",$attr);

        $this->display();
    }

    /** 
     * 登录表单处理 
     */  
    public function loginHandle()  
    {
        $code=$_POST["yzm"];
        $verify=new \Think\Verify();
        $z=$verify->check($code,2); //检测验证码
        if ($z && IS_POST) {  
            $user = D('User');  
            $where = array(  
                'uname' => I('post.name'),  
                'pwd' => I('post.pwd'),
                'status' => 1  
            );  
            $result = $user->where($where)->find();  
            if (!$result) {  
                $this->error("登陆失败");  
            }
            else{  

                //用户id
                $u_name = I('post.name');
                $u_id = $result['uid'];
                $u_group = $result['group'];
                $u_role_id = $result["u_role_id"];
                $u_test1 = $result["test1"];
                $u_proknowledge = $result["proknowledge"];
                $u_test2 = $result["test2"];
                $u_sellskills = $result["sellskills"];
                $u_test3 = $result["test3"];
                $u_speechcase = $result["speechcase"];
                $u_practice = $result["practice"];
                $u_friend = $result["friend"];
                $u_task7 = $result["task7"];
                session("uname",$u_name);
                session("uid",$u_id);
                session("group",$u_group);
                session("u_role_id",$u_role_id);
                session("test1",$u_test1);
                session("proknowledge",$u_proknowledge);
                session("test2",$u_test2);
                session("sellskills",$u_sellskills);
                session("test3",$u_test3);
                session("speechcase",$u_speechcase);
                session("practice",$u_practice);
                session("friend",$u_friend);
                session("task7",$u_task7);

                if($result["u_role_id"] == 2){  //实习客服
                	$this->success('欢迎登陆',U('Kefu/Comsys/index'));
                }
                else if($result["u_role_id"] == 3){
                    $this->success('欢迎登陆',U('NotKefu/Comsys/index'));
                }
                else{  //等于1时，跳转到管理端
                	$this->success('欢迎登陆',U('Admin/Index/filelist'));
                } 
            }  
        }
        else{
            $this->error("输入有误！","index");
        } 
    }

    /** 
     * 注册表单处理 
     */  
    public function register()  
    {
        $code=$_POST["yzm"];
        $verify=new \Think\Verify();
        $z=$verify->check($code,2); //检测验证码
        if ($z && IS_POST) {  
            $user = D('User');  
            $user->uname = I('post.name');
            $user->pwd = I('post.pwd');
            $user->group = I('post.group');
            $result = $user->add();  
            if (!$result) {  
                $this->error("注册失败！","index");  
            }
            else{  
                $this->success("注册成功！","index");
            }  
        }
        else{
            $this->error("输入有误！","index");
        } 
    }

    //生成验证码
    public function yzm()
    {
        $config=array(
        'fontSize'    =>    25,    // 验证码字体大小
        'length'      =>    4,     // 验证码位数
        );
         
        $Verify=new \Think\Verify($config);  //引用验证码类Verify
        //$Verify=D("Verify($config)");
        $Verify->entry(2);//生成验证码标示为2
    }


    /** 
     * 登出操作 
     */  
    public function logout(){  
        if(session("uname")){  
            session("uid",null);  
            session("uname",null);
            session("group",null);
            session("u_role_id",null);
            session("test1",null);
            session("test2",null);
            session("test3",null);
            session("practice",null);  
            session("task7",null);
            session(null);  
            $this->success("正在退出","index"); 
        }
        else{
            $this->redirect("Index/index");
        }   
    }


    /*更新是否正在进行考试字段*/
    public function isexam(){
        if (POST) {
            $value = $_POST["zhi"];
            $where = "uid = ".session("uid");
            $user = D("User");
            $user->isexam = $value;
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


    Public function zst062102(){
        $field = "role_id,role_name";
        $role = D("Role");
        $attr = $role->field($field)->select();
        $this->assign("rolelist",$attr);

        $field = "uid,uname";
        $user = D("User");
        $attr2 = $user->field($field)->order("crtime desc")->select();
        $this->assign("userlist",$attr2);

        $this->display();
    }

    public function zstupdate(){
        if (isset($_POST['uid']) && isset($_POST['u_role_id'])) {
            $u_role_id = $_POST['u_role_id'];
            $where = "uid = ".$_POST['uid'];
            $user = D("User");
            $user->u_role_id = $u_role_id;
            $z = $user->where($where)->save();
            if ($z) {
                $this->success("更改成功！","index");
            }
            else {
                $this->error("更改错误！","index");
            }
        }
        else {
            $this->error("抱歉，后台未接收到传出去的值！","index");
        }
    }
}