<?php
class dbHelper{
   //成员属性
	//服务器名称
	var $severName;
	//用户名
	var $useName;
	//用户密码
	var $usePwd;
	//数据库名称
	var $dbName;
	//链接标识符
	var $link;
	
	//初始化
	/**初始化链接数据库的相关参数
	 * @param unknown $severName
	 * @param unknown $useName
	 * @param unknown $usePwd
	 * @param unknown $dbName
	 */
	function __construct($severName,$useName,$usePwd,$dbName){
		$this->severName=$severName;
		$this->useName=$useName;
		$this->usePwd=$usePwd;
		$this->dbName=$dbName;
		//$this->link=$link;
	}
	
	/**
	 * 连接数据库的方法
	 */
	function connectDB(){
		$this->link=mysql_connect($this->severName,$this->useName,$this->usePwd)or die("数据库连接失败".mysql_error());
	    mysql_query("set names gbk");
	    mysql_select_db($this->dbName)or die("未找到指定的数据库");
	}
	
	/**
	 * @param unknown $query 要查询的语句
	 * @return multitype:multitype: |boolean
	 * 如果查询成功，返回二维数组，否则返回false
	 */
	function DQL($query){
		$result=mysql_query($query);
		//定义一个空的数组来存储每次拿到的数据(一维数组)
		$allarray=array();
		if($result){
			while(($arr=mysql_fetch_assoc($result))!=false){
				$allarray[]=$arr;
			}
			return $allarray;
		}else{
			return false;
		}
		
	}
	
	/**
	 * @param unknown $query 执行语句
	 * @return boolean
	 * 如果增删改成功，返回true，否则返回false
	 */
	function DML($query){
		$result=mysql_query($query);
		if($result){
			$affectedRows=mysql_affected_rows($this->link);
			if($affectedRows){
				return true;
			}else {
				return  false;
			}	
		}else{
			
			return  false;
		
		}
		
	}
	
}






?>