<?php
include 'DBhelper.class.php';
include '../Model/motifModel.class.php';
$db=new dbHelper("localhost", "root", "root", "cndiscuz");
$db->connectDB();
$m1=new motifModel();

//ר����
class prefecture{
	
	//��ѯר������
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
	//��ȡ���ӵ�ר��id
	function getaffichePrefecture($pname){
		$sql="select pid from prefecture where pname='{$pname}'";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
	//���� 
	function InsertMotif($m1){
		$sql="insert into affiche(pid,atitle,contents,uid,createtime)
		values('{$m1->pid}','{$m1->atitle}','{$m1->contents}','{$m1->uid}','{$m1->createtime}')";
		global $db;
		$res=$db->DML($sql);
		return $res;
		}
}

?>

