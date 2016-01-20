<?php

	$hostname = "localhost"; //mysql地址
	$dbname = "root"; //mysql用户名
	$dbpass = "000000"; //mysql密码
	$database = "sgk"; //mysql数据库名称

	$conn = mysql_connect($hostname,$dbname,$dbpass);
	mysql_select_db($database,$conn);
/*	if(!$conn){
		echo "Can't Conneect!<br/>";
	}else{
		echo "Conneect Success!<br/>";
	}*/
?>