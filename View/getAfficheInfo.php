<?php
include "head.php";
include "../DAL/prefecturePRC.class.php";
$p2=new prefectureProcess();
$pname=$_GET["pname"];
$pid=$_GET["pid"];
$res=$p2->getAfficheInfo($pid);
if(isset($_GET['success'])&&$_GET['success']==1){
	echo "<script type='text/javascript'>
		    alert('����ɹ�');
			</script>";
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
   <table id="tb2" border="1" width="775px" height="450px">
   <tr>
    <td colspan="5" height="30px">== <?php echo $pname; ?> ==</td>
   </tr>
   <tr>
   	 <td>״̬</td>
   	 <td>����</td>
   	 <td>����</td>
   	 <td>�ظ�/����</td>
   	 <td>����ʱ��</td>
   </tr>
   <?php 
   if($res){
     foreach ($res as $row){
	    echo "<tr>";
	    echo "<td>*</td>";
	    echo "<td><a href='afficheDetails.php?aid={$row['aid']}&pid={$pid}'>{$row['atitle']}</a></td>";
	    echo "<td>{$row['uname']}</td>";
	    $total=$p2->getCommentInfo($row['aid']);
	    echo "<td>{$total[0]['totals']}/{$row['clicks']}</td>";
	    echo "<td>{$row['createtime']}</td>";
	    echo "</tr>";
}
 
    }
    else{
         echo "<tr>";
         echo "<td colspan='5'>���ĸ�ר���»�û������</td>";
         echo "</tr>";
}
     
   
   ?>
   </table>
  </div>
</body>
</html>

<?php 
include "bottom.php";
?>