<?php 
namespace Home\Model;
use Think\Model;
/**
* 
*/
class LessonModel extends Model
{
	
	protected $_validate=array(
 array('title','','文章标题已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一


		);



}











 ?>