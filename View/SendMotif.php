<?php
include "head.php";
include '../DAL/prefecture.class.php';
$p1=new prefecture();
$res=$p1->Getprefecture();
if(isset($_SESSION['uname'])){
	//�Ѿ���½
}
else {
	//δ��½
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
   <form  method="post"  action="MotifProcess.php">
<table id="tb">

<tr><td>�� ��:<input type="text" name="atitle"></td></tr>
<tr><td>�� ��:<textarea rows="20" cols="80" name="contents"></textarea></td></tr>
<tr><td>ר ��:<select name="pname">
<?php 
if($res){
  foreach ($res as $row){
  echo "<option value='{$row['pname']}'>";
  echo "{$row['pname']}";
  echo "</option>";
}
}

?>
</select></td></tr>

<tr><td><input type="submit" name="sub" value="�� ��"></td></tr>
</table>
</form>
  </div>
</body>
</html>
<?php 
include "bottom.php";
?>