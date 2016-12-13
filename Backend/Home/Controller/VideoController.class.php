<?php 
namespace Home\Controller;
use Think\Controller;

/**
* 
*/
class VideoController extends Controller
{
	
	public function index()
	{
		$video=M("video")->select();
		$this->assign('video',$video);
		$this->display();





	}
	//del
	public function del()
	{
		$id=$_POST['delid'];
		if (M("video")->where("id=$id")->delete()) {
				$data['info']="删除成功";
				$this->ajaxReturn($data);
		}



	}
	public function add()
	{

		$this->display();
	}
	//doadd
	public function doadd()
	{	
		// $data['addtime']=date("Y-m-d H:i:s");
		// $id=M("video")->add($_POST);
	    // $data['id']=$id;
		// $data['info']="添加成功";
		$data['title']=$_POST['title'];
		$data['f']=$_POST['f'];
		$data['type']=$_POST['type'];
		$this->ajaxReturn($data);


	}
	//upload
	public function upload()
	{

		$upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
      
          
            }
            else{// 上传成功
              $image = new \Think\Image(); 
              $image->open('./uploads/'.$info['cover']['savepath'].$info['cover']['savename']);
              $width = $image->width(); // 返回图片的宽度
              $height = $image->height(); // 返回图片的高度
              $type = $image->type(); // 返回图片的类型
              $mime = $image->mime(); // 返回图片的mime类型
              $size = $image->size(); // 返回图片的尺寸数组 0 图片宽度 1 图片高度
              $image->thumb(150, 150,\Think\Image::IMAGE_THUMB_FIXED)->save('./uploads/'.$info['cover']['savepath'].$info['cover']['savename']);
              $image->water('./public/img/play.jpg',9 ,55)->save('./uploads/'.$info['cover']['savepath'].$info['cover']['savename']); 
             
              $data['title']=$_POST['title'];
              $data['f']=$_POST['f'];
              $data['type']=$_POST['type'];
              $data['addtime']=date("Y-m-d H:i:s");
              $data['cover']="./uploads/".$info['cover']['savepath'].$info['cover']['savename'];
           		if(M("video")->add($data)){

           			$this->success("添加成功");
           		}else{
           			echo "未知错误";
           		}
             
            }



	}















}






 ?>