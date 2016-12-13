<?php 
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
use Think\Page;
use Org\Util\Rbac;  
/**
* 
*/
class UserController extends Controller
{
	
	public function index()
	{
		var_dump($_SESSION);
		die;
		$user=new UserModel();
		$count=$user->count();
		//分页
		$page=new Page($count,2);//煤业两条数据
		$show=$page->show();
		$list = $user->Order('create_time desc')->page($_GET['p'].',2')->select();//赋值数据集
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('i',1);
		$this->display();



	}
	public function delete()
	{
		$id=$_POST['id'];
		$user=new UserModel();
		$bool=$user->where("id=$id")->delete();
		$u=$user->Order('create_time desc')->select();
		$data['u']=$u;
		$this->ajaxReturn($data);
		//$this->redirect('user/index');


	}
	public function add()
	{	

		$data['name']=$name=$_POST['name'];
		$data['password']=$_POST['password'];
		$data['create_time']=date("Y-m-d H:i:s");
		//$this->ajaxReturn($data);
		 $user=new UserModel();
		 if (!$user->create($data)) {
			$call=array('name'=>$name,'info'=>$user->getError());
			$this->ajaxReturn($call);
		}
		else{
			$user->add();
			$call=array('name'=>$name,'info'=>"添加成功");
			$this->ajaxReturn($call);

		}



	}
	//update
	public function update()
	{	
		$id=$_POST['id'];
		$user=new UserModel();
		$u=$user->where("id=$id")->find();
		$this->ajaxReturn($u);



	}
	public function doup()
	{	$id=$_POST['id'];
		$name=$_POST['name'];
		$password=$_POST['password'];
		$data=array(
				'name'=>$name,
				'password'=>$password,
				'create_time'=>date("Y-m-d H:i:s")
			);
		$user=new UserModel();
		// $this->ajaxReturn($data);
		if (!$user->create($data)) {
				$back['info']=$user->getError();
				$this->ajaxReturn($back);
		}
		else{
			$user->where("id=$id")->save($data);

			$back['info']='修改成功';
			$this->ajaxReturn($back);
		}


	}

	//login 
	public function login()
	{
		layout(false);
		$this->display();



	}
	public function logout()
	{
		session("adminname",null);
		session(C("USER_AUTH_KEY"),null); 
		session(C('ADMIN_AUTH_KEY'),false); 
		$this->redirect("user/login");
	}

	//do logoin
		//checklogin
	public function chklogin()
	{

		$u=new UserModel();
		$name=$_POST['name'];
		$password=$_POST['code'];
		$where['name']=$name;
		$where['password']=$password;

		$result=$u->where($where)->find();
		if ($result) {
			session('adminname',$name);

			 session(C("USER_AUTH_KEY"),$result['id']);  
   
                if($result['name']==C('RBAC_SUPERADMIN')){  
                    session(C('ADMIN_AUTH_KEY'),true);  
                }  
   
                //将权限写入session  
                Rbac::saveAccessList(); 


		}
		$data['find']=$result['id'];

		$data['name']=$name;
		$this->ajaxReturn($data);
	}


}

 ?>