$('body').on('click','.rankupdate',function(data){
   var clubname=$("input[name='clubname']").val();
		var matchtime=$("input[name='matchtime']").val();
		var rank=$("input[name='rank']").val();	
		var wintime=$("input[name='wintime']").val();	
		var defeattime=$("input[name='defeattime']").val();	
		var ping=$("input[name='ping']").val();	
		var shotgo=$("input[name='shotgo']").val();	
		var shotoff=$("input[name='shotoff']").val();
		var updateid=$(this).attr("updateid");
		var url=$(this).attr("action");
		$.post(url,{id:updateid,clubname:clubname,matchtime:matchtime,rank:rank,wintime:wintime,defeattime:defeattime,ping:ping,
			shotgo:shotgo,shotoff:shotoff,},function(data){
				alert(data.clubname+"足球俱乐部数据更新成功");

			});


});
$('body').on("click",".rankadd",function(){
		var clubname=$("input[name='clubname']").val();
		var matchtime=$("input[name='matchtime']").val();
		var rank=$("input[name='rank']").val();	
		var wintime=$("input[name='wintime']").val();	
		var defeattime=$("input[name='defeattime']").val();	
		var ping=$("input[name='ping']").val();	
		var shotgo=$("input[name='shotgo']").val();	
		var shotoff=$("input[name='shotoff']").val();	
		$(":input").val("");
		var url=$(this).attr("action");
		$.post(url,{clubname:clubname,matchtime:matchtime,rank:rank,wintime:wintime,defeattime:defeattime,ping:ping,
			shotgo:shotgo,shotoff:shotoff,},function(data){
				alert(data.clubname+"足球俱乐部添加成功");

			});
		
});
$('body').on('click','.rank-del',function(){
			var delid=$(this).attr("delid");
			var url=$(this).attr("action");
			$.post(url,{delid:delid},function(data){
				alert(data.info);
				$("tr[del-id='"+delid+"']").remove();




			});


















































});
$('body').on('click','.submit-search',function(){
	var url=$(this).attr("action");
	var key=$("input[name='key']").val();
	alert(key);

});