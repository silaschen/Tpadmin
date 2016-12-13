<?php 
namespace Home\Controller;
use Think\Controller;
use Think\Page;
/**
* 
*/
class RankController extends Controller
{
	
	public function index()
	{
		$count=M("rank")->count();
		$page=new Page($count,6);
		$show=$page->show();
		$list=M("rank")->Order("rank")->page($_GET['p'].',6')->select();
		$this->assign('page',$show);
		$this->assign('model',$list);
		$this->display();


	}
	//del
	public function del()
	{

		$id=$_POST['delid'];
		if(M("rank")->where("id=$id")->delete())
		{
			$data['info']="删除成功";
			$this->ajaxReturn($data);

		}
	}
	//add page
	public function add()
	{

		$this->display();
	}
	//doadd
	public function doadd()
	{	$_POST['directshot']=$_POST['shotgo']-$_POST['shotoff'];
	$_POST['score']=($_POST['wintime']*3)+($_POST['ping']*1);
		$id=M("rank")->add($_POST);
	    $_POST['id']=$id;
		$_POST['info']="添加成功";
		$this->ajaxReturn($_POST);


	}
	//show update page
	public function update()
	{
		$id=$_GET['id'];
		$model=M("rank")->where("id=$id")->find();
		$this->assign('model',$model);


		$this->display();
	}
	//deal with update
	public function doupdate()
	{

		$_POST['directshot']=$_POST['shotgo']-$_POST['shotoff'];
		$_POST['score']=($_POST['wintime']*3)+($_POST['ping']*1);
		
		if (M("rank")->save($_POST)) {
			$this->ajaxReturn($_POST);
		}
				
		






	}














}


 ?>