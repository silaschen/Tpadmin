    $('body').on("click",".comment-submit",function(){
          var pid=$(this).attr("pid");
          var lesson_id=$(this).attr("leid");
          var content=$.trim($(this).parent().children("textarea").val());
          var url=$(this).attr("action");
          $(this).parent().children("textarea").val("");
        
          if(content==""){

            alert('你还没有输入任何内容');
          }
          else{
                 $.post(url,{lid:lesson_id,pid:pid,content:content},function(data){

                  var newc="";
                      if(pid=="0"){

                                            //1 level comment
                        newc='<li class="media" comment_id="'+data.id+'"><div class="media-left"><a href="#" rel="author"><img width="48" height="48" class="media-object" src="'+data.head_pic+'" alt="xiaoshenzhen"></a></div><div class="media-body"><div class="media-heading"><a href="/user/35157" rel="author">'+data.editor+'</a> 评论于'+data.time+'</div><div class="media-content" comm_id="'+data.id+'"><p>'+data.content+
                        '</p><ul class="media-list children"></ul>'+
                                        
                                                  
                      '</div></div><div class="media-action"><a class="comment-reply" rid="'+data.id+'" lessonid="'+data.lesson_id+'"  href="javascript:void(0);"><i class="icon-reply"></i> 回复</a> </div></li><hr>';
                              $(".dad").prepend(newc);



                      }

                      else{


      newc='<li class="media" comment_id="'+data.id+'"><div class="media-left"><a href="" rel="author"><img  width="48" height="48" class="media-object" src="/fuckabc/'+data.head_pic+'"></a>'+
    '</div><div class="media-body"><div class="media-heading"><a href="/user/33873" rel="author">'+data.editor+'</a> 评论于'+data.time+'<span class="pull-right"><a  href="javascript:void(0);" lessonid="'+data.lesson_id+'" rid="'+data.id+'" ><i class="fa fa-reply"></i>回复</a></span></div><div class="media-content" comm_id="'+data.id+'"><p>'+data.content+'</p></div></div></li>';
              $("div[comm_id='"+data.pid+"']").children("ul").prepend(newc);
              $("div[countid='"+data.pid+"']").children("em").html(data.count);
                       }






          });
               }
        });
                
                    
    $("body").on("click",".comment-reply",function(){
      $(".comment-reply").next().remove();//删除已存在的所有回复div 
      //添加当前回复div
      var rid=$(this).attr("rid");
      var lid=$(this).attr("lessonid");
      var form="";
    
      
  form='<form><div class="form-group"><textarea name="comment" type="text" class="form-control"  rows="3" placeholder="pls login here to write ur comment"></textarea>'+
        '<a class="comment-submit btn btn-info" leid="'+lid+'"  pid="'+rid+'" action="/Zuqiuweb/index.php/home/lesson/addcomment">go</a></div></form>';
        $(this).after(form);


      






    });
 