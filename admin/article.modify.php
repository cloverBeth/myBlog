<?php
    require_once('../connect.php');
    //读取旧信息
    $id = intval($_GET['id']);
    $querySql="select * from article where id=$id";
    $query = mysqli_query($con,$querySql);
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
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>文章修改</title>
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../bower_components/ueditor/lang/zh-cn/zh-cn.js"></script>
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div style="width:100%;height:5rem;">
    <?php require_once('header.php');?>

</div>
<div class="container">
    <div class="manage-ctrl" align="center" valign="center">
        <p><a class="nav-light"href="article.add.php">发布文章</a></p>
        <p><a class="nav-light"href="article.manage.php?p=1">管理文章</a></p>
    </div>
    <table class="outer-wrapper" width="85%"border="0" cellpadding="28" cellspacing="1">
<!--        <tr>-->
<!--            <td height="60" class="theme" colspan="3">-->
<!--                <div class="logo"></div><h1>后台管理系统</h1>-->
<!--            </td>-->
<!--        </tr>-->
        <tr class="manage-body">
            <td width="85%" class="manage-body" valign="center">
                <form id="form1" name="form1" method="post" action="article.modify.handle.php">
                    <table width="779" border="0" cellpadding="15" cellspacing="1">
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
                            <td colspan="2" class="btn-submit"align="right">
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
    window.UEDITOR_CONFIG.imageUrl="{:U('Upload/uploadimg')}";
//    window.UEDITOR_CONFIG.imagePath=URL+'php/';
    var ue=UE.getEditor('content',{
        toolbars: [
            ['fullscreen', 'source', 'undo', 'redo', 'bold', 'italic', 'underline', 'fontborder', 'backcolor', 'fontsize', 'fontfamily', 'justifyleft',
                'justifyright', 'justifycenter', 'justifyjustify', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                'imagenone', 'imageleft', 'imageright', 'imagecenter', '|', 'insertimage', 'emotion', 'insertvideo', 'music', 'insertcode', 'background',
                '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', 'link', 'unlink', 'emotion', 'help']
        ]
    });
</script>
</body>
</html>
