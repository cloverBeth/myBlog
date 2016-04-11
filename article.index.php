<?php

session_start();
require_once('connect.php');
    $sql = "select * from article order by dateline desc";//按照文章发布顺序排
    $query = mysqli_query($con,$sql);
    if($query && mysqli_num_rows($query)){//mysqli_num_rows($query)检验结果集数据条数
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;//保存到数组$data[]
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>博文首页</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="images/umbrella.jpg" mce_href="images/umbrella" type="image/x-icon" />

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/angular/angular.min.js"></script>
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
                <ul class="nav navbar-nav tablist" id="nav-style">
                    <li class="active"><a href="#MyBlog" role="tab" data-toggle="tab">首页</a></li>
                    <li><a href="#tab-safari" role="tab" data-toggle="tab">关于我</a></li>
                </ul>
                <form class="navbar-form" action="login.php" method="post">

                    <div class="welcome">
                        <span> <?php echo $_SESSION['email']; ?> , 欢迎回来! </span>
                        <a href="admin/loginOut.php"  class="login-out">退出</a>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="请输入邮箱..." name="login_email" class="form-control"
                               id="login_email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="请输入密码..." name="login_pwd" class="form-control" id="login_pwd"
                               required="required">
                    </div>
                    <input type="submit" class="btn btn-default" data-toggle="modal" data-target="#successful" name="button"
                           id="button" value="登录" />
                    <a href="#" class="btn btn-default" data-toggle="modal"
                       data-target="#about-modal">注册</a>

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
                    <form name="register" id="register" method="post" action="admin/resgister.php">
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

    <div class="content-wrapper container-fluid tab-content">
<!--Mylog begin-->

        <div id="MyBlog" class="tab-pane active">
            <h4 class="main-title">
                博文首页
            </h4>

            <div class="articles">
                <div class="format-icon">
                    <span class="glyphicon glyphicon-picture frame-icon"></span>
                </div>

                <!--轮播图开始-->
                <div id="ad-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#ad-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#ad-carousel" data-slide-to="1"></li>
                        <li data-target="#ad-carousel" data-slide-to="2"></li>
                        <li data-target="#ad-carousel" data-slide-to="3"></li>
                        <li data-target="#ad-carousel" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="images/blog-1.jpg" width="100%" height="100%" alt="1 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>First Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/blog-2.jpg"  width="100%" height="100%" alt="2 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/blog-3.jpg" width="100%" height="100%" alt="3 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>Third Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/blog-4.jpg" width="100%" height="100%" alt="4 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>Forth Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>

                        <a class="left carousel-control" href="#ad-carousel" data-slide="prev"><span
                                class="glyphicon glyphicon-chevron-left"></span></a>
                        <a class="right carousel-control" href="#ad-carousel" data-slide="next"><span
                                class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div><!--轮播图结束-->

                <div class="article-detail container-fluid">

                <?php
                    if(empty($data)){
                        echo "当前没有文章，请管理员在后台添加文章";
                    }else{
                        foreach($data as $value){
                ?>

                <div class="article-repeat row">

                    <div class="blog-sub-title row">
                        <div class="clear"></div>
                        <h3><?php echo $value['title']?></h3>
                        <div class="clear"></div>
                    </div>

                    <ul class="info row">
                <?php
                    $id=$value['id'];
                    $listsql = "select * from comment where topic_id=$id";
                    $list = mysqli_query($con,$listsql);
                    $counts= mysqli_num_rows($list);
                ?>

                        <li class="col-sm-2"><i class="glyphicon glyphicon-comment"></i> <strong> <?php echo $counts ?></strong> Comments </li>
                        <li class="col-sm-2"><i class="glyphicon glyphicon-time"></i><?php $d=$value['dateline']; echo date("Y-m-d",$d)?></li>
                        <li class="col-sm-2"><i class="glyphicon glyphicon-user"></i> by <?php echo $value['author']?></li>
                        <!-- <li><i class="glyphicon glyphicon-tag"></i> jquery, slider, web design</li>-->
                    </ul>
                    <h5 class="article-description row">副标题:<?php echo $value['description']?></h5>
                    <div class="read-more row">
                        <a
                            href="article.showDetail.php?id=<?php echo $value['id'];?>"
                            class="more col-sm-4">Read More
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </a>
                    </div>
                </div>
                            <?php
                            }
                        }
                    ?>

                </div>

            </div>

        </div>

        <div class="tab-pane" id="tab-safari">
            <div class="row feature">
                <div class="col-md-7">

                    <h2 class="feature-heading">Safari <span class="text-muted">Mac用户首选</span></h2>

                    <p class="lead">Safari，是苹果计算机的最新操作系统Mac OS X中的浏览器，使用了KDE的KHTML作为浏览器的运算核心。
                        Safari在2003年1月7日首度发行测试版，并成为Mac OS X v10.3与之后的默认浏览器，也是iPhone与IPAD和iPod touch的指定浏览器。</p>
                </div>
                <div class="col-md-5">
                    <img class="feature-image img-responsive" src="images/safari-logo.jpg"
                         alt="Safari">
                </div>
            </div>
        </div>
    </div>
<img id="imgSinaShare" class="img_sina_share" title="将选中内容分享到新浪微博" src="http://simg.sinajs.cn/blog7style/images/common/share.gif" />


<!--Myblog end-->
<script>
    $(document).ready(function (){
//        $("ul#nav-style li").each(function(index){
//            $(this).click(function(){
//                $("ul#nav-style li").removeClass("active");
//                $("li").eq(index).addClass("active");
//            });
//        });

        $(".table1").css('display','none');
        var urlstr = location.href;
        //alert((urlstr + '/').indexOf($(this).attr('href')));
        var urlstatus=false;
        $("ul#nav-style li").each(function () {
            if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
                $(this).addClass('active'); urlstatus = true;
            } else {
                $(this).removeClass('active');
            }
        });
        if (!urlstatus) {
            $("ul#nav-style li").eq(0).addClass('active');
        }

    });

    $(function () {
        $('#ad-carousel').carousel();
        $('#menu-nav .navbar-collapse a').click(function (e) {
            var href = $(this).attr('href');
            var tabId = $(this).attr('data-tab');
            if ('#' !== href) {
                e.preventDefault();
//                $(document).scrollTop($(href).offset().top - 70);
                if (tabId) {
                    $('#feature-tab a[href=#' + tabId + ']').tab('show');
                }
            }
        });
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