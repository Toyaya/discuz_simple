<?php
include "head.php";
include "../DAL/affichePro.class.php";
if(isset($_GET['aid'])){
	$aid=$_GET['aid'];
	$pid=$_GET['pid'];
}
$a1=new afficheProcess();
$res=$a1->getAfficheDetails($aid);
$res1=$a1->getCommentByAid($aid);

?>

<html>
<head>
	<title></title>
	<style type="text/css">
		#div_affice{width:775px;
		min-height:900px;
		border: 1px blue solid;
		margin: 0 auto;
		box-sizing: border-box;
		overflow:auto;
	}
	#content{
	 width:700px;
	 height:200px;
	 border: 1px #cccccc solid;
     margin: 0 auto;
	
	}
		#message{
	 width:700px;
	 height:90px;
	 border: 1px #cccccc solid;
     margin: 0 auto;
	
	}

	</style>
	
</head>
<body>
 <div id="div_affice">
  <h1>����:<?php echo $res[0]['atitle'];?></h1>
     ���ߣ�<?php echo $res[0]['uname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     ����ʱ��:<?php echo $res[0]['createtime'];?><br/><br/>
      <div id="content">
                     ���ݣ�<?php echo $res[0]['contents'];?>
      </div>
   <h2>�鿴����</h2>
   <?php 
    if($res1){
     foreach($res1 as $v){
     echo "<div id='message'>";
     echo "<p>{$v['uname']}&nbsp;&nbsp;{$v['commenttime']}</p>";
     echo "<p>{$v['commentcontents']}</p>";
     echo "</div>";
}
    }else{
     echo "��������";
}
   ?>
   
   <h2>��������</h2>
   <?php 
   echo "";
   ?>
   <form action="processComment.php?pid=<?php echo $pid;?>&aid=<?php echo $aid;?>" method="post">
    <textarea name="myeditor" id="editor" style="width: 700px; height: 150px; margin: 0 auto;">
    </textarea>
    <input type="submit" value="����" name="sub" style="float: right;margin-right:40px;margin-top:5px;"/>
   </form>
   <script type="text/javascript">
    var ue = UE.getEditor('editor');
   </script>
 </div>
</body>
</html>

<?php 
include "bottom.php";
?>
