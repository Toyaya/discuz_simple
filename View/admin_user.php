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
         //��if˵�������ݣ���������
         foreach($res as $row)
         {
           echo "<tr>";
           echo "<td><span>�û���:{$row["username"]}</br></span>";
           echo "<span>���룺{$row['upwd']}</br></span>";
           echo "<span>�Ա�{$row['usex']}&nbsp;&nbsp;</span>";
           echo "<span>���գ�{$row['birthday']}&nbsp;&nbsp;</span>";
           echo "<span>�绰��{$row['tel']}&nbsp;&nbsp;</span>";
           echo "<span>QQ��{$row['qq']}&nbsp;&nbsp;&nbsp;</span>";
           echo "<span>Email��{$row['email']}&nbsp;&nbsp;&nbsp;</span>";
           echo "<span>���ڵأ�{$row['address']}&nbsp;&nbsp;</span>";
           echo "</td>";
           echo "<td>";
           echo "<a href='#'>�޸�&nbsp;&nbsp;</a>";
           echo "<a href='#'>ɾ��&nbsp;&nbsp;</a>";
           echo "<a href='#'>����&nbsp;&nbsp;</a>";
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
include 'admin_bottom.php';
?>