<?php
include '../DAL/adminPro.class.php';
$aid=$_POST['txtid'];
$apwd=$_POST['txtpwd'];
$a1=new adminProcess();
$res=$a1->loginPro($aid, $apwd);
 if($res){
	header("location:admin_index.php");
	
	
}else{
	echo "<script type='text/javascript'>
		    alert('µÇÂ½Ê§°Ü,ÇëÖØÐÂµÇÂ¼!');
			history.go(-1);
			</script>";
	
} 
?>