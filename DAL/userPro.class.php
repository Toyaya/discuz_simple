<?php
include 'DBhelper.class.php';
include '../Model/userModel.class.php';
$db=new dbHelper("localhost", "root", "root", "cndiscuz");
$db->connectDB();
$us1=new userModel();
class userProcess{
	//ดฆภํตวยผ
	function loginPro($us1){
		$sql="select * from user where username='{$us1->username}' and upwd='{$us1->upwd}'";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
	function myself($uname){
		$sql="select * from user where username='{$uname}'";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
	function myselfUpdate(){
		
	}
}
?>