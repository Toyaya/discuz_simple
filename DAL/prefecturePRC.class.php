<?php
include 'DBhelper.class.php';
$db=new dbHelper("localhost", "root", "root", "cndiscuz");
$db->connectDB();

/**
 * 专区类
 *
 */
class prefectureProcess{
	//获取专区信息列表的方法
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
	
	//获取对应专区下的帖子信息
	function getAfficheInfo($pid){
		$sql="select aid,atitle,user.username as uname,clicks,createtime from affiche,user where affiche.uid=user.uid and pid={$pid}";
		global  $db;
		$res=$db->DQL($sql);
		return $res;
	}
	
	//获取对应帖子下的回复信息总条数
	function getCommentInfo($aid){
		$sql="select count(*) as totals from commentinfo where aid={$aid}";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
}
?>
