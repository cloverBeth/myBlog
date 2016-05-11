<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>文章发布</title>
    <link rel="icon" href="../images/umbrella.jpg" mce_href="../images/umbrella" type="image/x-icon" />

    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/lang/zh-cn/zh-cn.js"></script>
    <link href="../css/default.css" rel="stylesheet" type="text/css" />


<body>
    <div style="width:100%;height:5rem;">
        <?php require_once('header.php');?>

    </div>
    <div class="container-fluid manage-outer-wrapper">
        <div class="row">
            <div class="manage-ctrl pull-left col-sm-2" align="center">
                <p><a class="nav-light"href="article.add.php">发布文章</a></p>
                <p><a class="nav-light"href="article.manage.php?p=1">管理文章</a></p>
                <p><a class="nav-light"href="end.login.php?action=loginout">退出登录</a></p>
            </div>
            <div class="pull-right col-sm-10">
                <form id="form1" name="form1" method="post" action="article.add.handle.php">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td colspan="2" height="60" align="center"><h2>发布文章</h2></td>
                            </tr>
                            <tr>
                                <td align="center">标题</td>
                                <td class="inputs">
                                    <label for="title"></label>
                                    <input type="text" name="title" id="title" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">作者</td>
                                <td class="inputs"><input type="text" name="author" id="author" /></td>
                            </tr>
                            <tr>
                                <td align="center">简介</td>
                                <td>
                                    <label for="description"></label>
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
                                <td colspan="2" align="center" class="btn-submit">
                                    <input type="submit" name="button" id="button" value="提交" />
                                </td>
                            </tr>
                        </table>

                    </div>
                </form>
            </div>
        </div>
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
