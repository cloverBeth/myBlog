<?php
require_once('../connect.php');
//读取旧信息
$id = $_GET['id'];
$query = mysqli_query($con,"select * from article where id=$id");
//if (!$query) {
//    printf("Error: %s\n", mysqli_error($con));
//    exit();
//}
$data = mysqli_fetch_assoc($query);

?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="../default.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
</head>

<body>
<table class="outer-wrapper" width="100%" height="760" border="0" cellpadding="28" cellspacing="1" bgcolor="#3B5998">
    <tr>
        <td height="89" class="theme" colspan="3" bgcolor="#3B5998">
            <div class="logo"></div><h1>后台管理系统</h1>
        </td>
    </tr>
    <tr bgcolor="#3B5998">
        <td class="manage-ctrl" width="15%" height="287" align="center" valign="top" bgcolor="#3B5998">
            <p><a class="nav-light"href="article.add.php">发布文章</a></p>
            <p><a class="nav-light"href="article.manage.php?p=1">管理文章</a></p>
            <a href="article.add.php"></a>
        </td>
        <td width="85%" class="scroll-com"valign="center" bgcolor="#FFFFFF">
            <form id="form1" name="form1" method="post" action="article.add.handle.php">
                <table width="779" border="0" cellpadding="8" cellspacing="1">
                    <tr>
                        <td colspan="2" align="center"><h2>修改文章</h2></td>
                    </tr>
                    <tr>
                        <td width="119">标题</td>
                        <td width="437" class="inputs"><label for="title"></label>
                            <input type="text" name="title" id="title" value="<?php echo $data['title']?>"/></td>
                    </tr>
                    <tr>
                        <td>作者</td>
                        <td class="inputs"><input type="text" name="author" id="author"  value="<?php echo $data['author']?>"/></td>
                    </tr>
                    <tr>
                        <td>简介</td>
                        <td><label for="description"></label>
                            <textarea name="description" id="description" cols="60" rows="5"><?php echo $data['description']?></textarea></td>
                    </tr>
                    <tr>
                        <td>内容</td>
                        <td><textarea name="content" cols="60" rows="20" id="content"><?php echo $data['content']?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="btn-submit"align="right"><input type="submit" name="button" id="button" value="提交" /></td>
                    </tr>
                </table>
            </form></td>
    </tr>
</table>
<div class="footer"><strong>版权所有&copy;</strong></div>

</body>
</html>
