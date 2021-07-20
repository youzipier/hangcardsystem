<?php
   //从远程服务器获取图片链接
   // $picName= 'jpg-2021638-20200821-39199.jpg';    //$_GET['pic'];
    $picName=$_GET['pic'];
	$pattern = '/^jpg-[0-9]{7}-[0-9]{8}-[0-9]{1,6}\.jpg$/';
	
	if(!preg_match($pattern, $picName)){
	    echo 'false';
		die();
	} 
	$serverurl='/var/up/HangCardSystem/uploads/';
	//$serverurl='../../../YanHuaTaskControlSystem/upload/TV/';
    $file=file_get_contents($serverurl.$picName);
    echo $file;
?>