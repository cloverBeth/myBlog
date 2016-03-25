<?php
require_once ('config.php');
//$con=mysqli_connect(HOST,USERNAME,PASSWORD,DB_NAME);
 //连库
if(!($con)){
    echo mysqli_error($con);
}
//选库
if(!mysqli_select_db($con,DB_NAME)){
    echo mysqli_error($con);
}
//字符集
if(!mysqli_query($con,'set names utf8')){
    echo mysqli_error($con);
}
ini_set('date.timezone','Asia/Shanghai');//设置时区

//$query=mysqli_query($con,'select * from article');
////mysqli_fetch_row($query);
//while($row=mysqli_fetch_row($query)){
//	print_r($row);
//}

