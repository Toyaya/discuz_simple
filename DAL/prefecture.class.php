<?php
include 'DBhelper.class.php';
include '../Model/motifModel.class.php';
$db=new dbHelper("localhost", "root", "root", "cndiscuz");
$db->connectDB();
$m1=new motifModel();

//专区类
class prefecture{
	
	//查询专区分类
	function Getprefecture(){
		$sql="select pname,pid from prefecture";
		global $db;
		$res=$db->DQL($sql);
		if($res){
			return $res;
		}
		else {
			echo false;
		}
	}
	//获取帖子的专区id
	function getaffichePrefecture($pname){
		$sql="select pid from prefecture where pname='{$pname}'";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
	//发帖 
	function InsertMotif($m1){
		$sql="insert into affiche(pid,atitle,contents,uid,createtime)
		values('{$m1->pid}','{$m1->atitle}','{$m1->contents}','{$m1->uid}','{$m1->createtime}')";
		global $db;
		$res=$db->DML($sql);
		return $res;
		}
}

?>

