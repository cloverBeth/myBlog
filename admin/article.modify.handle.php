<?php
require_once('../connect.php');
$id=intval($_POST['id']);
$title=$_POST['title'];
$author=$_POST['author'];
$description=$_POST['description'];
$content=$_POST['content'];
$dateline=time();

$update="update article set title='$title',author='$author',description='$description',
          content='$content',dateline=$dateline where id=$id";
$upq=mysqli_query($con,$update);
if (!$upq) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
if($upq){
    echo "<script>alert('修改文章成功');window.location.href='article.manage.php?p=1';</script>";
}else{
    echo "<script>alert('修改文章失败');window.location.href='article.manage.php?p=1';</script>";

}