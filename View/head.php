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
 		<a href="#">主题分类</a>&nbsp;||&nbsp;
 	    <a href="SendMotif.php">发布主题</a>&nbsp;||&nbsp;
 	    <a href="adminLogin.php">管理中心</a>&nbsp;||&nbsp;
 	    <a href="index.php">返回首页</a>&nbsp;||&nbsp;
 	    <a href="myself.php">个人中心</a>
 	</div>
 </div>
 <div style="margin: 5px auto;width:775px;height:60px;">
  <form action="loginProcess.php" method="post">
  <?php 
    if(isset($_SESSION['uname'])){
     //表示登录，改变状态
     echo "<span>欢迎 {$_SESSION['uname']} 登录！</span>";
     echo "<a href='loginOurPro.php'>注销</a>";
} else{
      echo '<font style="font-size:8px;">账号：</font><input placeholder="请输入账号" type="text" name="txtname"/>
 	 <font style="font-size:8px;">密码：</font><input placeholder="请输入密码" type="password" name="txtpwd"/>
	 <input type="text" name="verify" id="" placeholder="请输入验证码..">
  <img src="getVerify.php" alt="" id="vimg"/>
  <a href="#" onclick="clicks()" style="font-size:8px;">换一个</a>
  <input type="submit" name="sub" value="登录"/>
  <a href="#">注册</a>';
}
  ?>
 	
 </form>
 </div>
</body>
</html>
