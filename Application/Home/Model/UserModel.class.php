<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {

	public function panisexam(){
		$where = "uid = ".session("uid");
        $user = D("User");
        $re = $user->field("isexam")->where($where)->find();
        if ($re['isexam'] == 1) {
        	return false;
        }
        else{
        	return true;
        }
	}
}