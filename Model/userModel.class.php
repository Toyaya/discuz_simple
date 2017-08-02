<?php
class userModel{
	private  $username;
	private  $upwd;
	function __set($k,$v){
		$this->$k=$v;
	}
	
	function __get($k){
		return $this->$k;
	}
}
?>