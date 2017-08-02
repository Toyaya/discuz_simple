<?php
include 'admin_head.php';
include "../DAL/adminPro.class.php";
$a2=new adminProcess();
$res=$a2->getadminuser();
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
       if($res)
      {
         //进if说明有数据，遍历数据
         foreach($res as $row)
         {
           echo "<tr>";
           echo "<td><span>用户名:{$row["username"]}</br></span>";
           echo "<span>密码：{$row['upwd']}</br></span>";
           echo "<span>性别：{$row['usex']}&nbsp;&nbsp;</span>";
           echo "<span>生日：{$row['birthday']}&nbsp;&nbsp;</span>";
           echo "<span>电话：{$row['tel']}&nbsp;&nbsp;</span>";
           echo "<span>QQ：{$row['qq']}&nbsp;&nbsp;&nbsp;</span>";
           echo "<span>Email：{$row['email']}&nbsp;&nbsp;&nbsp;</span>";
           echo "<span>所在地：{$row['address']}&nbsp;&nbsp;</span>";
           echo "</td>";
           echo "<td>";
           echo "<a href='#'>修改&nbsp;&nbsp;</a>";
           echo "<a href='#'>删除&nbsp;&nbsp;</a>";
           echo "<a href='#'>增加&nbsp;&nbsp;</a>";
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