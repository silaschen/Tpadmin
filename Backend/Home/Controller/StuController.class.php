<?php 
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class StuController extends Controller
{
	
	public function index()
	{
		if(IS_GET)
		{

			$key=$_GET["key"];
			  // $stime="2016-10-26 00:00:00";
			// $etime="2016-10-26 19:21:00";
			 // $st=strtotime($stime);
			// $et=strtotime($etime);
			
		if($stime && $etime){
			$map['time']=array("BETWEEN",array($stime,$etime));
			

		} else{
			$map["name"]=array("like","%".$key."%");
			
		}
			
			$list=M("stu")->where($map)->select();
			$this->assign("list",$list);
			var_dump($list);
			die;
			$this->display();
		}

	}
	#del#
	public function del()
	{

		if(IS_GET){

			$id=$_GET['id'];
			$r=M("stu")
			->where(array("id"=>$id))
			->delete();
			if ($r) {
				 echo "<script>alert('删除成功');</script>";
				 $this->redirect("index");
			}
		}
	}
	#add and edit#
	public function add()
	{
		if (IS_GET) {//GET is for editing and add.
			$id=$_GET['id'];
			$stu=M("stu")->where(array("id"=>$id))->find();
			$this->assign("stu",$stu);//传值
			$this->display();//打开模板
		}else{//add post
			$data=$_POST;
			$data['time']=date("Y-m-d H:i");
			if ($data['id']>0) {//说明是修改
				$r=M("stu")->where(array("id"=>$data['id']))->save($data);
				
			}
			else//do add
			{
				$r=M("stu")->add($data);




			}
			if ($r) {
				$this->success("保存成功");
			}else{

				$this->error("失败");
			}




		}



	}

}


 ?>