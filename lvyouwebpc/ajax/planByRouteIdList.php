<?php 
//解决跨域请求问题
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");
require_once("lvyouwebpc/model/responseResultInfo.php");
require_once("lvyouwebpc/services/plansService.php");
 // $routeId="";
 // if(array_key_exists("routeId",$_GET)){
	// $routeId=$_GET["routeId"];
 
 // }else{
	// $routeId='7dccca45-227b-11e8-902a-1c872c75b691';
 // }

$routeId=$_GET["routeId"];
//echo $routeId;

//获取所有地区
$plans=PlansService::getPlanByRouteId($routeId);
//给接口一个初始返回值
$result=new ResponseResultInfo(101,"请求失败",null);
//不为null值，就返回是有值的。
if($plans){
	$result -> code=100;
	$result -> message="请求成功";
	$result -> data=$plans;
}
 //print_r($result);
//返回一组json格式的数据
echo json_encode($result);