<?php
require_once('../connect.php');
$id=$_GET['id'];
$delete = "delete from article where id=$id";
    if (mysqli_query($con, $delete)) {
        echo "<script>alert('删除文章成功');window.location.href='article.manage.php?p=1';</script>";
    } else {
        echo "<script>alert('删除文章失败');window.location.href='article.manage.php?p=1';</script>";
    }
