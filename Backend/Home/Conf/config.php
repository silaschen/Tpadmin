<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'foot',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'chen1210',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'news_',    // 数据库表前缀
    'LAYOUT_ON'             =>  true, // 是否启用布局
    'LAYOUT_NAME'           =>  'layout', // 当前布局名称 默认为layout


    'RBAC_SUPERADMIN'=>'admin',  
    'ADMIN_AUTH_KEY' =>'superAdmin', //超级管理员识别  
    'USER_AUTH_ON' =>true,  //是否开启权限验证  
    'USER_AUTH_TYPE' =>1,   //验证类型(1:登录时验证2:时时验证)  
    'USER_AUTH_KEY' =>'uid', //用户验证识别号  
    'NOT_AUTH_ACTION' =>'', // 无需验证的动作方法  
    'NOT_AUTH_MODULE' =>'', //无需验证的控制器  
    // 'USER_AUTH_MODEL' =>'news_user',
    'RBAC_ROLE_TABLE' =>'news_think_role',//角色表名称  
    'RBAC_USER_TABLE' => 'news_think_role_user',//用户与角色的中间表  
    'RBAC_ACCESS_TABLE' =>'news_think_access',//权限表  
    'RBAC_NODE_TABLE' =>'news_think_node',//节点表  
    // 'URL_HTML_SUFFIX' =>'',  
    // 'SHOW_PAGE_TRACE' => true,  
);