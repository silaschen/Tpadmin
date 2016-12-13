// 动态加载模态框
function loadpage(url,w,m){
    if(m == undefined){
        if($("#temp_modal").html() > 0){
            // 如果存在
            $("#temp_modal").modal('hide');
            $("#temp_modal").remove();
        }
        // 如果容器不存在 使用备用容器
        var temp_modal = '<div class="modal" id="temp_modal"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><b class="modal-title">查看详情</b></div><div class="modal-body" id="temp_content"></div><div class="modal-footer"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button></div></div></div></div>';
        $("body").append(temp_modal);
        m = '#temp_modal';
        w = '#temp_content';
    }
    $(w).html("<center><img src='Public/res/loading_icon.gif'></center>");
    $(w).load(url);
    $(m).modal('show');
}