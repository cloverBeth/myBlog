<?php
header("Content-type:text/html;charset=utf-8");
define('HOST','localhost:3306');
define('USERNAME','root');
define('PASSWORD','root');
define('DB_NAME','artManage');
$con=mysqli_connect(HOST,USERNAME,PASSWORD,DB_NAME);
//$HOST='localhost:3306';
//$USERNAME='root';
//$PASSWORD='root';
//$DBNAME='artManage';


