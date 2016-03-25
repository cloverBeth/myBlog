<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link rel="icon" href="../src/images/begins.jpg" mce_href="../src/images/begins.jpg" type="image/x-icon" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <!-- 配置文件 -->
    <script type="text/javascript" src="../bower_components/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../bower_components/utf8-php/ueditor.all.js"></script>
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
                        <td colspan="2" height="60" align="center"><h2>发布文章</h2></td>
                    </tr>
                    <tr>
                        <td width="119"align="center">标题</td>
                        <td width="625" class="inputs"><label for="title"></label>
                            <input type="text" name="title" id="title" /></td>
                    </tr>
                    <tr>
                        <td align="center">作者</td>
                        <td class="inputs"><input type="text" name="author" id="author" /></td>
                    </tr>
                    <tr>
                        <td align="center">简介</td>
                        <td><label for="description"></label>
                            <textarea name="description" id="description" cols="80" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td align="center">内容</td>
                        <td>
                            <textarea name="content" cols="70" rows="15" id="content">

                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right" class="btn-submit">
                            <input type="submit" name="button" id="button" value="提交" />
                        </td>
                    </tr>
                </table>
            </form></td>
    </tr>

</table>

    <div class="footer"><strong>版权所有&copy;</strong></div>
</body>
</html>
