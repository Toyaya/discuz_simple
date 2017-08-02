<?php
include 'DBhelper.class.php';
$db=new dbHelper("localhost", "root", "root", "cndiscuz");
$db->connectDB();
/**
 * 帖子类
 *
 */
class afficheProcess{
	//获取帖子的详细信息
	function getAfficheDetails($aid){
		$sql="select atitle,contents,createtime,user.username as uname from affiche,user where affiche.uid=user.uid and aid={$aid} order by createtime desc";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	//获取谋篇帖子下的回复信息（评论）
	function getCommentByAid($aid){
		$sql="select user.username as uname,commentcontents,commenttime from commentinfo,user where commentinfo.uid=`user`.uid and aid={$aid} order by commenttime desc";
		global $db;
		$res=$db->DQL($sql);
		return $res;
	}
	function setCommentConteents($aid,$contents,$time,$uid,$pid){
		$sql="insert into commentinfo(aid,commentcontents,commenttime,uid,pid) values('{$aid}','{$contents}','{$time}','{$uid}','{$pid}')";
		global $db;
		$res=$db->DML($sql);
		return $res;
		
	}
	
}
?>
