<?php
include 'admin_head.php';
include "../DAL/adminPro.class.php";
$a1=new adminProcess();
$res=$a1->getadminAffiche();
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
           echo "<td><span>����ר��:{$row["pname"]}</br></span>";
           echo "<span>���⣺{$row['atitle']}</br></span>";
           echo "<span>�����ˣ�{$row['username']}</span>";
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