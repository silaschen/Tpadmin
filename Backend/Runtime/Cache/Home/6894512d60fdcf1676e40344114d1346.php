<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
  
    <link rel="icon" href="../../favicon.ico">

    <title>login</title>

    <!-- Bootstrap core CSS -->
    <link href="/foot/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/foot/Public/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="/foot/Public/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form id="form" class="form-signin" role="form" >
        <h2 class="form-signin-heading">Please login</h2>
        <input type="text" class="form-control" placeholder="User name" id="name" name="name" required autofocus>
        <input type="password" name="code" class="form-control" id="code" placeholder="Password" required>
        <div class="text-muted text-center" id="warn"></div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <a id="sign" class="btn btn-lg btn-primary btn-block" type="submit">Sign</a>
      </form>

    </div> <!-- /container -->
    <script type="text/javascript" src="/foot/Public/js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
      $("#sign").on('click',function(){
          $.post("/foot/admin.php/home/user/chklogin",{name:$("#name").val(),code:$("#code").val()},function(data){
            $("#warn").html("<i class='fa fa-spinner fa-spin fa-3x'></i>");
            if (data.find>0) {

              setTimeout(function(){
                  location.href="/foot/admin.php/home/index/index";

              },1000);

            }else{

                 setTimeout(function(){
                   $("#warn").html("不存在此用户");
              },1000);

            


                      }

          });


      });

  });


</script>


  </body>
</html>