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

    }else {


        session_start();
        $_SESSION['email'] = $adminName;
        $_SESSION['pwd'] = $adminPwd;


        if ($_GET['action'] == "loginout") {
            session_destroy();
            echo "<script>window.location.href='end-login.html';</script>";
        }

        echo "登录失败!";
    }
?>