<?php
 include "head.php";
 include "../DAL/prefecturePRC.class.php";
 $p1=new prefectureProcess();
 //echo "<script type='text/javascript'>alert('���ȵ�¼');</script>";
 if(isset($_GET['error'])&&$_GET['error']==1){
 	echo "<script type='text/javascript'>
		    alert('���¼��');
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
   <table border="1" width="775px" height="450px">
     <tr>
       <td colspan="3">��ǰʱ�䣺<?php echo date("Y-m-d");?></td></tr>
     <?php 
      $res=$p1->getPrefectureInfo();
      if($res)
      {
         //��if˵�������ݣ���������
         foreach($res as $row)
         {
           echo "<tr>";
           echo "<td><img src='{$row["pimg"]}'/></td>";
           echo "<td>";
           echo "<a href='getAfficheInfo.php?pid={$row["pid"]}&pname={$row["pname"]}'>ר����{$row['pname']}��</a><br/>";
           echo "<span>������{$row['moderator']}</span>";
           echo "</td>";
           echo "<td>";
           echo "�������ڣ�{$row['createtime']}<br/>";
           $totals=$p1->getTitlesByPid($row["pid"]);
           echo "����������{$totals[0]['total']}<br/>";
           $nowTotals=$p1->getNowTitlesByPid($row["pid"], date("Y-m-d"));
           echo "��������������{$nowTotals[0]['total']}";
           echo "</td>";
           echo "</tr>";
         }
       }else
       {
          echo "<tr>";
          echo "<td colspan='3'>δ�鵽�κ�����</td>";
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