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
	//��ʾ��¼���ı�״̬
	$uid=$_SESSION['uid'];
	$res=$s1->setCommentConteents($aid, $contents, $time, $uid, $pid);
	if($res){
		echo "<script type='text/javascript'>
		    alert('���۳ɹ���');
			history.go(-1);
			</script>";
		
	}
	else{
		echo "<script type='text/javascript'>
		    alert('����ʧ�ܣ�');
			history.go(-1);
			</script>";
	}
	
} else{
	echo "<script type='text/javascript'>
		    alert('���ȵ�¼��');
			history.go(-1);
			</script>";
}

?>