<?php
include 'admin_head.php';
include "../DAL/prefecturePRC.class.php";
$p1=new prefectureProcess();
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
           echo "<a href='#'>修改</a><br/>";
           echo "<a href='#'>删除</a><br/>";
           echo "<a href='#'>增加</a><br/>";
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
include 'admin_bottom.php';
?>