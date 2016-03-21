<?php

require_once('connect.php');
$page=$_GET['p'];
$sql="select * from article LIMIT " .($page-1)*3 .",3";
$result=mysqli_query($con,$sql);
$pageSize=10;
echo "<table border=1 cellspacing=0 width='40%'";
echo "<tr><td>编号</td><td>标题</td><!--<td>操作</td>--></tr>";
while($row=mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo"<td> {$row['id']} </td>";
    echo "<td>{$row['title']}</td>";
//    echo "<td><a href='#' class=''>删除</a><a href='#'>修改</a></td>";
    echo "</tr>";
}echo "</table>";

mysqli_free_result($result);

//获取数据库的数据综述
$total="select count(*) from article";
$total_num=mysqli_fetch_array(mysqli_query($con,$total));
$totalOne=$total_num[0];
$showPage=3;
 //计算页数
$total_pages=ceil($totalOne/3);
mysqli_close($con);

$page_banner="";

//偏移量
$pageoffset=($showPage-1)/2;

if($page>1)
{
    $page_banner.="<a href='".$_SERVER["PHP_SELF"]. "?p=1'>首页</a>";
    $page_banner.="<a href='".$_SERVER["PHP_SELF"]. "?p=" .($page-1). "'>上一页</a>";
}

//初始化
$start=1;
$end=$total_pages;
if($total_pages>$showPage){
    if($page>$pageoffset+1){
        $page_banner.="...";
    }
    if($page>$pageoffset){
        $start=$page-$pageoffset;
        $end=$total_pages>$page+$pageoffset?$page+$pageoffset:$total_pages;
    }else{
        $start=1;
        $end=$total_pages>$showPage?$showPage:$total_pages;
    }
    if($page+$pageoffset>$total_pages){
        $start=$start-($page+$pageoffset-$end);
    }
}

for($i=$start;$i<=$end;$i++){
    $page_banner.="<a href='".$_SERVER["PHP_SELF"]. "?p=" .($i). "'>$i</a>";
}

//尾部省略
if($total_pages>$showPage&&$total_pages>$page+$pageoffset){
    $page_banner.="...";
}
if($page<$total_pages){
    $page_banner.="<a href='".$_SERVER["PHP_SELF"]. "?p=" .($page+1). "'>下一页</a>";
    $page_banner.="<a href='".$_SERVER["PHP_SELF"]. "?p=" .($total_pages). "'>尾页</a>";

}
$page_banner.=" 共{$total_pages}页 ";
echo $page_banner;
?>
