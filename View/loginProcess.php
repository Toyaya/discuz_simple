<?php
session_start();
include '../DAL/userPro.class.php';
//include '../Model/userModel.class.php';
$u1=new userProcess();
$us1=new userModel();
$us1->username=$_POST['txtname'];
$us1->upwd=$_POST['txtpwd'];
$put=$_POST['verify'];
$int=$_SESSION['verifyCode'];
$res=$u1->loginPro($us1);
if($res&&$put==$int){
	//echo "OK";
	 $_SESSION['uname']=$res[0]['username'];
	 $_SESSION['uid']=$res[0]['uid'];
	 //echo $_SESSION['uname'];
	 echo "<script type='text/javascript'>
		    alert('��½�ɹ�');
			history.go(-1);
			</script>";
	
			
}
else{
	if($put!=$int){
		echo "<script type='text/javascript'>
		    alert('��֤����󣬵�½ʧ��');
			history.go(-1);
			</script>";
	}
	else{
		echo "<script type='text/javascript'>
		    alert('�˺�������󣬵�½ʧ��');
			history.go(-1);
			</script>";
	}
	//echo "��¼ʧ��";
	
}
?>