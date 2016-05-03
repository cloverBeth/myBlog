<?php
    require_once('../config/connect.php');


$adminName=$_POST['adminAccount'];
$adminPwd=$_POST['adminPwd'];
$adminSql = "select admin_name,password from super_admin where admin_name='$adminName'
              and password='$adminPwd' ";

$result = mysqli_query($con,$adminSql);
$adminCol = mysqli_num_rows($result);


if($adminCol){
    echo "<script>alert('登录成功');window.location.href='article.manage.php?p=1';</script>";

}else{
    echo "登录失败!";
}
?>