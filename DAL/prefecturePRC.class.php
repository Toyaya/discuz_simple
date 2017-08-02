<?php
include 'DBhelper.class.php';
$db=new dbHelper("localhost", "root", "root", "cndiscuz");
$db->connectDB();

/**
 * ר����
 *
 */
class prefectureProcess{
	//��ȡר����Ϣ�б�ķ���
	function getprefectureInfo(){
		$sql="select pid,pimg,pname,moderator,createtime 
    			from prefecture";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	function getTitlesByPid($pid){
		$sql="select count(aid) as total from affiche
		where pid={$pid}";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	function getNowTitlesByPid($pid,$date)
	{
		$sql="select count(aid) as total from affiche
		where pid={$pid} and createtime like '{$date}%'";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
	//��ȡ��Ӧר���µ�������Ϣ
	function getAfficheInfo($pid){
		$sql="select aid,atitle,user.username as uname,clicks,createtime from affiche,user where affiche.uid=user.uid and pid={$pid}";
		global  $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
	//��ȡ��Ӧ�����µĻظ���Ϣ������
	function getCommentInfo($aid){
		$sql="select count(*) as totals from commentinfo where aid={$aid}";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
}
?>
