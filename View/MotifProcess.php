<?php
include '../DAL/prefecture.class.php';
$p1=new prefecture();
$m1=new motifModel();
session_start();
  if(isset($_POST["sub"])){
 	$pname=$_POST["pname"];
 	$id=$p1->getaffichePrefecture($pname);
 	$pid=$id[0]['pid'];
	$m1->atitle=$_POST["atitle"];
	$m1->contents=$_POST["contents"];
	$m1->uid=$_SESSION['uid'];
	$m1->pid=$pid;
	$m1->createtime=date("Y-m-d ");
	$res=$p1->InsertMotif($m1);
	if($res){
		header("location:getAfficheInfo.php?success=1&pid={$pid}&pname={$pname}");
	}
} 
?> 