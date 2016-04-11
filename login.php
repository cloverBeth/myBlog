<?php
//session_start();
require_once('connect.php');
//require_once ('article.showDetail.php');
$posts = $_POST;
//  清除一些空白符号
foreach ($posts as $key => $value) {
    $posts[$key] = trim($value);
}
$email=$_POST['login_email'];
$pwd=$_POST['login_pwd'];

$loginsql = "select email,pwd from users where email='$email' and pwd='$pwd'";
$result = mysqli_query($con,$loginsql);
$loginnum = mysqli_num_rows($result);
    if ($loginnum) {
        session_start();
        $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中
//        var_dump($row);
        $_SESSION['authorized'] = true;
        $_SESSION['email']=$email;
        $_SESSION['pwd']=$pwd;
        echo "<script>alert('登录成功！');window.location.href='article.index.php';</script>";
    } else {
        echo "<script>alert('用户名或密码不正确！');window.location.href='article.index.php';</script>";

}

?>