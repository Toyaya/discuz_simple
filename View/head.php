<?php
session_start();
?>
<html>
<head>
	<title></title>
	<style type="text/css">
		#head{width:775px;
		height:120px;
	/*	background-color:red;*/
	    background-image: url(imgs/1.gif);
	    background-size: 100% 100%;
		margin: 0 auto;
	}
	#menu{
		width: 100%;
		height: 40px;
		margin-left: 290px;
		margin-top: 40px;
	}
	#menu a{
		text-decoration: none;
		color: red;
	}
	#menu a:hover{
		text-decoration: underline;
	}
	</style>
	<script type="text/javascript" charset="gbk" src="editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="gbk" src="editor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="gbk" src="editor/lang/zh-cn/zh-cn.js"></script>
    <script>
       function clicks(){
    	   document.getElementById("vimg").src="getVerify.php?r="+Math.random();
           }
    </script>
</head>
<body>
 <div id="head">
 	<br>
 	<br>
 	<div id="menu">
 		<a href="#">�������</a>&nbsp;||&nbsp;
 	    <a href="SendMotif.php">��������</a>&nbsp;||&nbsp;
 	    <a href="adminLogin.php">��������</a>&nbsp;||&nbsp;
 	    <a href="index.php">������ҳ</a>&nbsp;||&nbsp;
 	    <a href="myself.php">��������</a>
 	</div>
 </div>
 <div style="margin: 5px auto;width:775px;height:60px;">
  <form action="loginProcess.php" method="post">
  <?php 
    if(isset($_SESSION['uname'])){
     //��ʾ��¼���ı�״̬
     echo "<span>��ӭ {$_SESSION['uname']} ��¼��</span>";
     echo "<a href='loginOurPro.php'>ע��</a>";
} else{
      echo '<font style="font-size:8px;">�˺ţ�</font><input placeholder="�������˺�" type="text" name="txtname"/>
 	 <font style="font-size:8px;">���룺</font><input placeholder="����������" type="password" name="txtpwd"/>
	 <input type="text" name="verify" id="" placeholder="��������֤��..">
  <img src="getVerify.php" alt="" id="vimg"/>
  <a href="#" onclick="clicks()" style="font-size:8px;">��һ��</a>
  <input type="submit" name="sub" value="��¼"/>
  <a href="#">ע��</a>';
}
  ?>
 	
 </form>
 </div>
</body>
</html>
