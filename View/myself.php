<?php
include "head.php";
include '../DAL/userPro.class.php';
$uname=$_SESSION['uname'];
$um=new userProcess();
$res=$um->myself($uname);
if(isset($_SESSION['uname'])){
	//�Ѿ���½
}
else {
	//δ��½
	echo "<script type='text/javascript'>alert('���ȵ�¼');</script>";
	header("Location:index.php?error=1");
}
?>
<html>
<head>
	<title></title>
	<style type="text/css">
		#main{width:775px;
		height:450px;
		border: 1px blue solid;
		margin: 0 auto;
		box-sizing: border-box;
	}
	</style>
</head>
<body>
  <div id="main">
  <form action="myselfProcess.php" method="post">
  <table id="tb2" border="1" width="775px" height="450px">
   <tr>
    <td colspan="5" height="30px">== <?php echo $uname; ?> ==</td></tr>
    <?php 
    echo "<tr><td>�û���:<input type='text' value='{$res[0]['username']}' name='username' /></td></tr>";
    echo "<tr><td>��ʵ����:<input type='text' value='{$res[0]['truename']}'  name='truename' /></td></tr>";
    echo "<tr><td>����:<input type='text' value='{$res[0]['upwd']}'  name='upwd' /></td></tr>";
    echo "<tr><td>�Ա�:<input type='text' value='{$res[0]['usex']}'  name='usex' /></td></tr>";
    echo "<tr><td>����:<input type='text' value='{$res[0]['birthday']}' name='birthday' /></td></tr>";
    echo "<tr><td>�绰:<input type='text' value='{$res[0]['tel']}'  name='tel' /></td></tr>";
    echo "<tr><td>QQ:<input type='text' value='{$res[0]['qq']}'  name='qq' /></td></tr>";
    echo "<tr><td>����:<input type='text' value='{$res[0]['email']}'  name='email' /></td></tr>";
    echo "<tr><td>������ҳ:<input type='text' value='{$res[0]['personPage']}'  name='personPage' /></td></tr>";
    echo "<tr><td>��ַ:<input type='text' value='{$res[0]['address']}'  name='address' /></td></tr>";
    echo '<tr><td><input type="submit" name="sub" value="�޸���Ϣ" /></td></tr>';
    ?>
   </table>
  </form>
  </div>
</body>
</html>
<?php 
include "bottom.php";
?>