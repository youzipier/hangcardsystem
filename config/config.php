<?php
///*

$debug=0;

$ProDir="http://".$_SERVER['SERVER_NAME'].'/'.str_replace('/var/www/html/','/',dirname(__FILE__));

$FunctionDefine='';

$webnerveMssqlDBInfo = array(
    "host" => "stdb",
    "user" => "U_Linux_Php_ExaminationSystem",
    "passwd" => 'lyxIjL!M60D1',
    'database' => 'DB_WebNerveData'//数据库名称，方便后面的相对路径调用
);

//$webnerveMssqlDBInfo = array(
//    "host" => "websale1",
//    "user" => "sa",
//    "passwd" => "sql2005",
//    'database' => 'DB_WebNerveData'
//);


?>
