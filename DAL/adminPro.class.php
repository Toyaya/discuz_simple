<?php
include 'DBhelper.class.php';
$db=new dbHelper("localhost", "root", "root", "cndiscuz");
$db->connectDB();
class adminProcess{
	//处理登录
	function loginPro($aid,$apwd){
		$sql="select * from admin where aid='{$aid}' and apwd='{$apwd}'";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	//获取帖子的详细信息
	function getadminAffiche(){
		$sql="select pname,atitle,username from affiche,user,prefecture where affiche.uid=user.uid and affiche.pid=prefecture.pid";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
	//获取用户的详细信息
	function getadminuser(){
		$sql="select * from user";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
}
?>