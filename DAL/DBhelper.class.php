<?php
class dbHelper{
   //��Ա����
	//����������
	var $severName;
	//�û���
	var $useName;
	//�û�����
	var $usePwd;
	//���ݿ�����
	var $dbName;
	//���ӱ�ʶ��
	var $link;
	
	//��ʼ��
	/**��ʼ���������ݿ����ز���
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
	 * �������ݿ�ķ���
	 */
	function connectDB(){
		$this->link=mysql_connect($this->severName,$this->useName,$this->usePwd)or die("���ݿ�����ʧ��".mysql_error());
	    mysql_query("set names gbk");
	    mysql_select_db($this->dbName)or die("δ�ҵ�ָ�������ݿ�");
	}
	
	/**
	 * @param unknown $query Ҫ��ѯ�����
	 * @return multitype:multitype: |boolean
	 * �����ѯ�ɹ������ض�ά���飬���򷵻�false
	 */
	function DQL($query){
		$result=mysql_query($query);
		//����һ���յ��������洢ÿ���õ�������(һά����)
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
	 * @param unknown $query ִ�����
	 * @return boolean
	 * �����ɾ�ĳɹ�������true�����򷵻�false
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