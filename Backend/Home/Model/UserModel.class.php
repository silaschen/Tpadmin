<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
   protected $_validate = array(
    // array('verify','require','验证码必须！'), //默认情况下用正则进行验证
     array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
     //array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
   );
}



 ?>