<?php 
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class PicnewsController extends Controller
{
	
	public function index()
	{
    $lesson=M("picnews")->order("time desc")->select();

    $this->assign('lesson',$lesson);

    $this->display();
	}
	//add new one
	public function add()
	{
    if (IS_GET) {//DISPLAY the tpl
      $this->display();

    }else{//deal with the data
      if (IS_AJAX) {
         $title=$_POST['title'];
        $ms=$_POST['ms'];
        $content=$_POST['content'];
        $type=$_POST['type'];
        $editor=session("name");
        $time=date("Y-m-d H:i:s");
        $data=array(
          'title'=>$title,
          'ms'=>$ms,
          'content'=>$content,
          'type'=>$type,

          );

        $this->ajaxReturn($data);
      } 
    }

	
	}

	// //doadd
	// public function doadd()
	// {
	// 	$title=$_POST['title'];
	// 	$ms=$_POST['ms'];
	// 	$content=$_POST['content'];
	// 	$type=$_POST['type'];
	// 	$editor=session("name");
	// 	$time=date("Y-m-d H:i:s");
	// 	$data=array(
	// 		'title'=>$title,
	// 		'ms'=>$ms,
	// 		'content'=>$content,
	// 		'type'=>$type,

	// 		);

	// 	$this->ajaxReturn($data);





	// }

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
              $image->open('./uploads/'.$info['picture']['savepath'].$info['picture']['savename']);
              $width = $image->width(); // 返回图片的宽度
              $height = $image->height(); // 返回图片的高度
              $type = $image->type(); // 返回图片的类型
              $mime = $image->mime(); // 返回图片的mime类型
              $size = $image->size(); // 返回图片的尺寸数组 0 图片宽度 1 图片高度
              $image->open('./uploads/'.$info['picture']['savepath'].$info['picture']['savename'])->text('Zuqiu wang','./public/fonts/journal-webfont.ttf',20,'#000000',\Think\Image::IMAGE_WATER_SOUTHEAST)->save('./uploads/'.$info['picture']['savepath'].$info['picture']['savename']); 
              $data['editor']=session("name");
              $data['title']=$_POST['title'];
              $data['ms']=$_POST['ms'];
              $data['content']=$_POST['content'];
              $data['type']=$_POST['type'];
              $data['time']=date("Y-m-d H:i:s");
              $data['picture']="./uploads/".$info['picture']['savepath'].$info['picture']['savename'];
           		if(M("picnews")->add($data)){

           			$this->success("添加成功");
           		}else{
           			echo "未知错误";
           		}
             
            }



    }

	
}

 ?>