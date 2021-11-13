<?php
date_default_timezone_set("PRC");   //系统使用北京时间
require 'JWT.php'; //引入JWT库
use \Firebase\JWT\JWT; //使用\Firebase\JWT\JWT命名空间
define('KEY', '1gHuiop975cdashyex9Ud23ldsvm2Xq');//定义加密秘钥
function validate($jwt){	
        $res['result'] = 'failed';//定义result初始值
         //非登录操作
		if(empty($jwt)){
		$res['msg']="非法登录";
		return $res['result'];
	    }			
	//如果请求头，token不为空，解码后返回json给ajax
	try{
		 JWT::$leeway = 60;
        $decoded = JWT::decode($jwt, KEY, ['HS256']);
        $arr = (array)$decoded;
        if ($arr['exp'] < time()) {
            $res['msg'] = '请重新登录';
        } else {
            $res['result'] = 'success';
            
        }

	}catch(Exception $e){//解码失败
		$res['msg']="Token验证失败，请重新登录";
	}
    return $res['result'];
	}
?>