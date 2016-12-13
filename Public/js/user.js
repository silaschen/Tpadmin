$('body').on('click','.user-update',function(data){
	
         var name=$("input[name='name']").val();
		var password=$("input[name='password']").val();
		var campus=$("input[name='campus']").val();	
		var address=$("input[name='address']").val();	
		var email=$("input[name='email']").val();	
		var sign=$("input[name='sign']").val();	
		var updateid=$(this).attr("updateid");
		var url=$(this).attr("action");
		$.post(url,{id:updateid,name:name,password:password,campus:campus,address:address,email:email,sign:sign,
		},function(data){
				alert(data.name+"更新成功");

			});


});