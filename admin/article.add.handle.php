<?php
require_once('../connect.php');
//把传递过来的信息入库
//print_r($_POST);
if(!(isset($_POST['title'])&&(!empty($_POST['title'])))){
    echo "<script>alert('标题不能为空');window.location.href='article.add.php';</script>";
    return;
}
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$content = $_POST['content'];
$dateline = time();
$insert = "insert into article(title, author, description, content, dateline) values('$title', '$author', '$description', '$content', $dateline)";

//echo $insert;
if(mysqli_query($con,$insert)){
    echo "<script>alert('发布文章成功');window.location.href='article.manage.php?p=1';</script>";
}else{
    echo "<script>alert('发布失败');window.location.href='article.manage.php?p=1';</script>";
}
