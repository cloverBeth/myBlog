<?php
require_once('../connect.php');
session_id(SID);
session_start();
$email = $_POST['reg_email'];
$password = $_POST['reg_pwd'];
$login_time = time();
$sql = "select email from users where email='$email'";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
$insert = "insert into users(email, pwd, login_time) values
            ('$email', '$password', $login_time)";
if(!(isset($_POST['reg_email'])&&(!empty($_POST['reg_email'])))) {
    echo "<script>alert('请填写完整');window.location.href='../article.index.php';</script>";
    return;
}else if($num){
    echo "<script>alert('用户名已存在');window.location.href='../article.index.php';</script>";
}
//echo $insert;
if(mysqli_query($con,$insert)){
    echo "<script>alert('注册成功!');window.location.href='../article.index.php';</script>";
}else{
    echo "<script>alert('注册失败!');window.location.href='../article.index.php';</script>";
}
?>