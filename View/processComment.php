<?php
include "../DAL/affichePro.class.php";
session_start();
$contents=$_POST['myeditor'];
$pid=$_GET['pid'];
$aid=$_GET['aid'];
$time=date("Y-m-d");
$s1=new afficheProcess();

//echo $pid;
//echo $aid;
//echo $uid;
if(isset($_SESSION['uname'])){
	//表示登录，改变状态
	$uid=$_SESSION['uid'];
	$res=$s1->setCommentConteents($aid, $contents, $time, $uid, $pid);
	if($res){
		echo "<script type='text/javascript'>
		    alert('评论成功！');
			history.go(-1);
			</script>";
		
	}
	else{
		echo "<script type='text/javascript'>
		    alert('评论失败！');
			history.go(-1);
			</script>";
	}
	
} else{
	echo "<script type='text/javascript'>
		    alert('请先登录！');
			history.go(-1);
			</script>";
}

?>