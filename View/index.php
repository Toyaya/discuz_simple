<?php
 include "head.php";
 include "../DAL/prefecturePRC.class.php";
 $p1=new prefectureProcess();
 //echo "<script type='text/javascript'>alert('请先登录');</script>";
 if(isset($_GET['error'])&&$_GET['error']==1){
 	echo "<script type='text/javascript'>
		    alert('请登录！');
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
       <td colspan="3">当前时间：<?php echo date("Y-m-d");?></td></tr>
     <?php 
      $res=$p1->getPrefectureInfo();
      if($res)
      {
         //进if说明有数据，遍历数据
         foreach($res as $row)
         {
           echo "<tr>";
           echo "<td><img src='{$row["pimg"]}'/></td>";
           echo "<td>";
           echo "<a href='getAfficheInfo.php?pid={$row["pid"]}&pname={$row["pname"]}'>专区【{$row['pname']}】</a><br/>";
           echo "<span>版主：{$row['moderator']}</span>";
           echo "</td>";
           echo "<td>";
           echo "创建日期：{$row['createtime']}<br/>";
           $totals=$p1->getTitlesByPid($row["pid"]);
           echo "主题总数：{$totals[0]['total']}<br/>";
           $nowTotals=$p1->getNowTitlesByPid($row["pid"], date("Y-m-d"));
           echo "今日主题总数：{$nowTotals[0]['total']}";
           echo "</td>";
           echo "</tr>";
         }
       }else
       {
          echo "<tr>";
          echo "<td colspan='3'>未查到任何数据</td>";
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