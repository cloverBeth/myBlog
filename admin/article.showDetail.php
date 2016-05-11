<?php
session_start();

require_once('../config/connect.php');

$id = intval($_GET['id']);//intval()转换为整数类型
$sql = "select * from article where id=$id";

$timeline=time();
if($_POST['submit']){
    $sqlcom = "insert into comment(username,email,content,pubTime,topic_id) values
                  ('$_POST[comment_author]','$_POST[email]','$_POST[comment]',$timeline,$id)";
    $sq=mysqli_query($con,$sqlcom);
//    if (!$sq) {
//        printf("Error: %s\n", mysqli_error($con));
//        exit();
//    }
    echo "
    <div class='alert alert-success alert-dismissible col-lg-offset-4 col-sm-offset-4 col-md-offset-4
            col-lg-4 col-sm-4 col-md-4' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong>评论成功!</strong>
    </div>
";
}

$listsql = "select * from comment where topic_id=$id";
$list = mysqli_query($con,$listsql);

if($list&&mysqli_num_rows($list)){//mysqli_num_rows($query)检验结果集数据条数
    while($row = mysqli_fetch_assoc($list)){
        $data[] = $row;//保存到数组$data[]
    }
}

$query = mysqli_query($con,$sql);
if($query&&mysqli_num_rows($query)){
    $row = mysqli_fetch_assoc($query);
}else{
    echo "<script>window.location.href='article.index.php';</script>";
    exit;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章详情</title>

    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="../images/umbrella.jpg" mce_href="images/umbrella" type="image/x-icon" />

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/angular/angular.min.js"></script>
    <link rel="stylesheet" href="../css/index.css">

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#example1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"id="brand-rain"></a>
            <span class="title-blog">我的博客 </span class>

        </div>
        <div class="collapse navbar-collapse"id="example1">
            <ul class="nav navbar-nav"id="nav-style">
                <li class=""><a href="article.index.php">首页</a></li>
<!--                <li><a href="article.index.php">AboutMe</a></li>-->
            </ul>
            <form class="navbar-form" action="login.php" method="post">
                <div class="welcome">
                    <span> <?php echo $_SESSION['email']; ?> , 欢迎回来! </span>
                    <?php echo '<a href="loginOut.php?action=logout" class="login-out">注销</a>' ?>

                    <!--                    <a href="admin/loginOut.php" class="login-out">退出</a>-->
                </div>
<!--                <div class="form-group">-->
<!--                    <input type="text" placeholder="请输入邮箱..." name="login_email" class="form-control"-->
<!--                           id="login_email" required="required">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input type="password" placeholder="请输入密码..." name="login_pwd" class="form-control" id="login_pwd"-->
<!--                           required="required">-->
<!--                </div>-->
<!--                <input type="submit" class="btn btn-default" data-toggle="modal" data-target="#successful" name="button"-->
<!--                       id="button" value="登录" />-->
                <a href="#" class="btn btn-default" data-toggle="modal"
                   data-target="#about-modal">注册
                </a>

            </form>

        </div>


    </div>
</nav>

<!--注册模态框开始-->
<div class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title" id="modal-label">注册</h4>
            </div>
            <div class="modal-body">
                <form name="register" id="register" method="post" action="resgister.php">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">邮箱注册:</label>
                        <input type="email" placeholder="请输入注册邮箱" name="reg_email" class="form-control" id="reg_email"
                               required="required">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">密码:</label>
                        <input type="password" name="reg_pwd" placeholder="请输入密码" class="form-control" id="reg-pwd"
                               required="required">

                    </div>
                    <input type="submit" data-toggle="modal" data-target="#successful" name="button" id="button" value="注册" />

                </form>
            </div>

        </div>
    </div>
</div>
<!--注册模态框结束-->

<div class="content-wrapper container-fluid">
    <!--Mylog begin-->
    <div id="MyBlog" class="tab-pane active">
        <h4 class="main-title">
           博文详情
        </h4>

<!--        <div class="articles">-->

    <!--轮播图开始-->
<!--            <div id="ad-carousel" class="carousel slide" data-ride="carousel">-->
<!--            <ol class="carousel-indicators">-->
<!--                <li data-target="#ad-carousel" data-slide-to="0" class="active"></li>-->
<!--                <li data-target="#ad-carousel" data-slide-to="1"></li>-->
<!--                <li data-target="#ad-carousel" data-slide-to="2"></li>-->
<!--                <li data-target="#ad-carousel" data-slide-to="3"></li>-->
<!--                <li data-target="#ad-carousel" data-slide-to="4"></li>-->
<!--            </ol>-->
<!--           <div class="carousel-inner">-->
<!--             <div class="item active">-->
<!--                <img src="images/blog-1.jpg" width="100%" height="100%" alt="1 slide">-->
<!---->
<!--                <div class="container">-->
<!--                    <div class="carousel-caption">-->
<!--                        <h4>First Thumbnail label</h4>-->
<!--                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <img src="images/blog-2.jpg"  width="100%" height="100%" alt="2 slide">-->
<!---->
<!--                <div class="container">-->
<!--                    <div class="carousel-caption">-->
<!--                        <h4>Second Thumbnail label</h4>-->
<!--                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <img src="images/blog-3.jpg" width="100%" height="100%" alt="3 slide">-->
<!---->
<!--                <div class="container">-->
<!--                    <div class="carousel-caption">-->
<!--                        <h4>Third Thumbnail label</h4>-->
<!--                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <img src="images/blog-4.jpg" width="100%" height="100%" alt="4 slide">-->
<!---->
<!--                <div class="container">-->
<!--                    <div class="carousel-caption">-->
<!--                        <h4>Forth Thumbnail label</h4>-->
<!--                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <a class="left carousel-control" href="#ad-carousel" data-slide="prev"><span-->
<!--                    class="glyphicon glyphicon-chevron-left"></span></a>-->
<!--            <a class="right carousel-control" href="#ad-carousel" data-slide="next"><span-->
<!--                    class="glyphicon glyphicon-chevron-right"></span></a>-->
<!--        </div>-->
<!--    </div>-->
    <!--轮播图结束-->


    <div class="article-detail container-fluid">

        <div class="article-repeat row">
            <div class="format-icon">
                <span class="glyphicon glyphicon-picture frame-icon"></span>
            </div>
                <div class="blog-sub-title row">
                    <div class="clear"></div>
                    <h3><?php echo $row['title']?></h3>
                    <div class="clear"></div>
                </div>

                <ul class="info row">
                    <li class="col-sm-2"><i class="glyphicon glyphicon-comment"></i> <strong><?php echo mysqli_num_rows($list)?></strong> Comments</li>
                    <li class="col-sm-2"><i class="glyphicon glyphicon-time"></i><?php $d=$row['dateline']; echo date("Y-m-d",$d)?></li>
                    <li class="col-sm-2"><i class="glyphicon glyphicon-user"></i> by <?php echo $row['author'];?></li>
                    <!--                    <li><i class="glyphicon glyphicon-tag"></i> jquery, slider, web design</li>-->
                </ul>
                <h5 class="article-description row"><?php echo $row['description']?></h5>
                <div class="article-contents">
                    <?php echo $row['content']?>
                </div>
<!--            <form id="form1" name="form1" method="post" action="admin/comment.php">-->
<!--                <div class="text-box container">-->
<!--                    <textarea name="message" class="comment col-sm-12 col-lg-12 col-md-12"placeholder="评论..." autocomplete="off"></textarea>-->
<!--                    <a><input class="btn" type="submit" value="回 复"/></a>-->
<!--                    <span class="word"><span class="length">0</span>/140</span>-->
<!--                </div>-->
<!---->
<!---->
<!--            </form>-->



            <section id="comments" class="body">

                <div class="blog-sub-title row">
                    <div class="clear"></div>
                    <h3><?php echo mysqli_num_rows($list)?>comments</h3>
                    <div class="clear"></div>
                </div>
                <?php
                if(empty($data)){
                    echo "<script></script>";
                }else{
                foreach($data as $commens){
                ?>
                <div class="post_comments">

                    <div class="clear"></div>

                    <div class="comments">

                        <div class="comment row" style="font-family:Comic Sans MS;font-size:14px;">
                            <img src="../images/header.png" width="100" height="100" alt="img" />
                            <div class="text">
                                <div class="name"><?php echo $commens['username']?><a class="reply" href="#">Reply</a></div>
                                <div class="date"><?php $ld=$commens['pubTime']; echo date("Y-m-d H:m",$ld)?></div>
                                <?php echo $commens['content']?>
                            </div>
                        </div>

                   </div>
                </div>
                <!-- .post_comments -->
                    <?php
                         }
                        }
                    ?>
                <div id="respond">

                    <h3 class="leave row">Leave a Comment</h3>

                    <form action="" class="form-horizontal" method="post" id="commentform">

                        <div class="form-group">
                            <label for="comment_author" class="col-sm-2 control-label required">Your name</label>
                            <div class="col-sm-6 col-lg-6">
                                <input type="text" class="form-control" name="comment_author" id="comment_author" value="" placeholder="请输入邮箱" tabindex="1" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label required">Your email</label>
                            <div class="col-sm-6 col-lg-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="请输入合法邮箱" value="<?php echo $_SESSION['email']?>" tabindex="2" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label required">Your message</label>
                            <div class="col-sm-6 col-lg-6">
                                <textarea name="comment" id="comment" class="form-control" rows="8" tabindex="2" placeholder="请输入您的评论..."  required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-lg-6 col-lg-offset-3">
                                <input type="hidden" name="comment_post_ID" value="<?php echo $commens['topic_id']?>" id="comment_post_ID" />
                                <?php if($_SESSION['email']==null){
                                echo '请先<a href="article.index.php">登录</a>再评论哦!';}else{
                                    echo '<input name="submit" class="comBtn" type="submit" value="发送评论" />';
                                }
                                ?>
                            </div>
                        </div>
                    </form>

                </div>

            </section>

        </div>
    </div>
    <div class="footer blog-footer">
        <div>&copy;sunnyPig</div>
    </div>
    <img id="imgSinaShare" class="img_sina_share" title="将选中内容分享到新浪微博" src="http://simg.sinajs.cn/blog7style/images/common/share.gif" />

<!--</div>-->

<!--Myblog end-->

        <script>

            $(document).ready(function (){
//        $("ul#nav-style li").each(function(index){
//            $(this).click(function(){
//                $("ul#nav-style li").removeClass("active");
//                $("li").eq(index).addClass("active");
//            });
//        });

                var urlstr = location.href;
                //alert((urlstr + '/').indexOf($(this).attr('href')));
                var urlstatus=false;
                $("ul#nav-style li").each(function () {
                    if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
                        $(this).addClass('active');
                        urlstatus = true;
                    } else {
                        $(this).removeClass('active');
                    }
                });
                if (!urlstatus) {
                    $("ul#nav-style li").eq(0).addClass('active');
                }

            });

            var eleImgShare = document.getElementById("imgSinaShare");

            var $sinaMiniBlogShare = function(eleShare, eleContainer) {
                var eleTitle = document.getElementsByTagName("title")[0];
                eleContainer = eleContainer || document;
                var funGetSelectTxt = function() {
                    var txt = "";
                    if(document.selection) {
                        txt = document.selection.createRange().text;	// IE
                    } else {
                        txt = document.getSelection();
                    }
                    return txt.toString();
                };
                eleContainer.onmouseup = function(e) {
                    e = e || window.event;
                    var txt = funGetSelectTxt(), sh = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
                    var left = (e.clientX - 40 < 0) ? e.clientX + 20 : e.clientX - 40, top = (e.clientY - 40 < 0) ? e.clientY + sh + 20 : e.clientY + sh - 40;
                    if (txt) {
                        eleShare.style.display = "inline";
                        eleShare.style.left = left + "px";
                        eleShare.style.top = top + "px";
                    } else {
                        eleShare.style.display = "none";
                    }
                };
                eleShare.onclick = function() {
                    var txt = funGetSelectTxt(), title = (eleTitle && eleTitle.innerHTML)? eleTitle.innerHTML : "未命名页面";
                    if (txt) {
                        window.open('http://v.t.sina.com.cn/share/share.php?title=' + txt + '→来自页面"' + title + '"的文字片段&url=' + window.location.href);
                    }
                };
            }(eleImgShare);


        </script>

</body>
</html>