<?php 
namespace Home\Controller;

use Think\Controller;
use Home\Model\LessonModel;
use Home\Controller\CommonController;
/**
* 
*/
class LessonController extends CommonController
{
    #NEWS LIST#
	public function index()
	{
        if (IS_GET) {
            //get the key

                $word = $_GET['word'];


                //map
                $map = array();
                //condition
                if ($word) {

                 $map["A.title|A.description|A.content|B.clubname"]=array("like","%".$word."%");

                }
                



                $lesson=new LessonModel();
                $le=$lesson->alias("A")
                ->join("LEFT JOIN news_rank B ON A.forteam=B.id")->where($map)->Order("A.addtime desc")->field("A.id,A.title,A.status,A.addtime,B.clubname")->select();
               
                $this->assign('lesson',$le);
                $this->display();

        }else{//AJAX DELETE NEWS
            if (IS_AJAX) {
                $id=$_POST['id'];
            if(M("lesson")->where("id=$id")->delete()){
                $data['id']=$id;
                $this->ajaxReturn($data);

                }
             
            }

        }
		
	}

    #add and edit #
	public function add()
    {
        if (IS_GET) {
            $id = $_GET['id'];//get the id
            if ($id) {

                  $info = M("lesson")->where(array("id"=>$id))->find();
                  $this->assign("info",$info);       
            }

            //get all club
            $team = M("rank")->order("rank desc")->select();
            $this->assign("team",$team);
            $this->display();

        }else{

                $data=$_POST;
                if ($data['id'] > 0) {//upadte the old data
                    $f = M("lesson")->where(array("id"=>$data['id']))->save($data);
                    $arr = $data;



                }else{//add new data

                    $time=date("Y-m-d H:i:s");
                    $name=session("adminname");
                    $arr=array(
                        'title'=>$data['title'],
                        'description'=>$data['description'],
                        'content'=>$data['content'],
                        'tag'=>$data['tag'],
                        'forteam'=>$data['forteam'],
                        'editor'=>$name,
                        'addtime'=>$time
                      );
                    $id=M("lesson")->add($arr);
                    $arr['id']=$id;
                  

                }

                  $this->ajaxReturn($arr);
              }
     
    }
   





}
 ?>