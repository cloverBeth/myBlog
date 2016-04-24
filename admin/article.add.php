<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>文章发布</title>
    <link rel="icon" href="../images/umbrella.jpg" mce_href="../images/umbrella" type="image/x-icon" />
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/lang/zh-cn/zh-cn.js"></script>
    <link href="../default.css" rel="stylesheet" type="text/css" />


<body>
    <div style="width:100%;height:5rem;">
        <?php require_once('header.php');?>

    </div>
    <div class="container">
        <div class="manage-ctrl" align="center" valign="center">
            <p><a class="nav-light"href="article.add.php">发布文章</a></p>
            <p><a class="nav-light"href="article.manage.php?p=1">管理文章</a></p>
        </div>
        <table class="outer-wrapper" width="85%" height="760" border="0" cellpadding="28" cellspacing="1" >
<!--        <tr>-->
<!--            <td height="60" class="theme" colspan="3" >-->
<!--                <div class="logo"></div><h1>后台管理系统</h1>-->
<!--            </td>-->
<!--        </tr>-->
           <tr class="manage-body">
                <td width="85%" class="manage-body"valign="center">
                    <form id="form1" name="form1" method="post" action="article.add.handle.php">
                        <table width="779" border="0" cellpadding="15" cellspacing="1">
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
                                    <textarea name="description" id="description" cols="80" rows="5"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">内容</td>
                                <td>
                                    <textarea name="content" cols="70" rows="15" id="content"></textarea>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" class="btn-submit">
                                    <input type="submit" name="button" id="button" value="提交" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
             </tr>

        </table>
    </div>
    <div class="footer"><strong>版权所有&copy;</strong></div>


    <script type="text/javascript">
    var ue=UE.getEditor('content',{
        toolbars: [
            ['fullscreen', 'source', 'undo', 'redo', 'bold', 'italic', 'underline', 'fontborder', 'backcolor', 'fontsize', 'fontfamily', 'justifyleft',
                'justifyright', 'justifycenter', 'justifyjustify', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                'insertimage', 'emotion', 'insertvideo', 'music', 'insertcode', 'background',
                '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', 'link', 'unlink', 'emotion', 'help']
        ]
    });
   alert(ue.getContent());
    </script>
</body>
</html>
