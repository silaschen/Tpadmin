<?php
namespace Home\Controller;  
   
   
use Org\Util\Rbac;  
use Think\Controller;  
   
/** 
 * Class CommonController 
 * @package Admin\Controller 
 * 用户验证用户的状态，实现用户页面保留的功能 
 */  
class CommonController extends Controller  
{  
    /** 
     * 自动执行函数，tp中自带 
     */  
    public function _initialize(){  
        if(!session("uid")){  
            $this->redirect('user/login');  
        }  
   
        if(C('USER_AUTH_ON')){  
            
            Rbac::AccessDecision()||$this->error("你没有权限");  
        }  
    }

    public function study(){
        $end=strtotime("2016-08-13 13:00:00");
        $now=strtotime(date("Y-m-d H:i:s"));
        $left=$end-$now;//剩余总秒数
        $day=floor($left/(3600*24));//剩余天数
        $hour=floor(($left-$day*3600*24)/3600);//剩余小时
        $min=floor(($left-$day*3600*24-$hour*3600)/60);//剩余分钟
        $sec=floor($left-$day*3600*24-$hour*3600-$min*60);
        $data=array(
            'd'=>$day,
            'h'=>$hour,
            'min'=>$min,
            'sec'=>$sec

            );
        $this->ajaxReturn($data);


  }  

  #checklogin#
  public function checklogin()
  { 
    if (!$_SESSION['uid']) {
        
        $this->redirect("User/login");
    }



  }

 
}  

?>