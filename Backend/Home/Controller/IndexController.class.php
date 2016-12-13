<?php
namespace Home\Controller;
use Think\Controller;

use Think\Page;
class IndexController extends Controller {
    public function index(){
   
      $this->display();
      
    }

  #权限管理之节点#
    // public function nodelist(){
     
    //   if (IS_GET) {
    //     $p = I("p",'1');
    //       $map['status'] = array("egt",0);
            
    //         $model = M('think_node'); // 实例化User对象
    //         // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
    //         $list = $model->where($map)->page($p.',2')->select();
    //         $this->assign('list',$list);// 赋值数据集
           

    //         $count      = $model->where($map)->count();// 查询满足要求的总记录数
    //         $Page       = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
    //         //分页跳转的时候保证查询条件
    //         $page->rollPage = 5 ;
    //         foreach($map as $key=>$val) {
    //             $Page->parameter[$key]   =   urlencode($val);
    //         }
    //         $show = $Page->show();// 分页显示输出
    //         $this->assign('page',$show);// 赋值分页输出
          
    //         $this->display(); // 输出模板

    //   }





    // }
  



}