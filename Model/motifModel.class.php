<?php
class motifModel{
	private  $pid;
	private  $atitle;
	private  $contents;
	private  $uid;
	private  $createtime;
	function __set($k,$v){
		$this->$k=$v;
	}

	function __get($k){
		return $this->$k;
	}
}
?>