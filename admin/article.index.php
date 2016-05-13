<?php

session_start();
require_once('../config/connect.php');
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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="../images/umbrella.jpg" mce_href="images/umbrella" type="image/x-icon" />
    <link href="../bower_components/lightBox/style.css" rel="stylesheet" type="text/css" />

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/angular/angular.min.js"></script>
    <script src="../bower_components/lightBox/lib/jquery-1.8.2.min.js"></script>
    <script src="../bower_components/lightBox/lib/jquery.notesforlightbox.js" type="text/javascript"></script>
    <link href="../bower_components/lightBox/jquery.notesforlightbox.css" rel="stylesheet" type="text/css" />
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
                <a href="#" class="navbar-brand" id="brand-rain"></a>
                <span class="title-blog">我的博客 </span>

            </div>
            <div class="collapse navbar-collapse"id="example1">
                <ul class="nav navbar-nav tablist" id="nav-style">
                    <li class="active"><a href="#MyBlog" role="tab" data-toggle="tab">首页</a></li>
                    <li><a href="#tab-safari" role="tab" data-toggle="tab">关于我</a></li>
                </ul>
                <form class="navbar-form" action="login.php" method="post">

                    <div class="welcome">
                        <span> <?php echo $_SESSION['email']; ?> , 欢迎回来! </span>
                        <?php echo '<a href="loginOut.php?action=logout" class="login-out">注销</a>' ?>
<!--                        <a href="article.index.php" action="admin/loginOut.php"  >退出</a>-->
                    </div>
<!--                    <div class="form-group">-->
<!--                        <input type="text" placeholder="请输入邮箱..." name="login_email" class="form-control"-->
<!--                               id="login_email" required="required">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <input type="password" placeholder="请输入密码..." name="login_pwd" class="form-control" id="login_pwd"-->
<!--                               required="required">-->
<!--                    </div>-->
                    <input type="button" class="btn nav-login-btn" data-toggle="modal" data-target="#successful" name="button"
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
                        <input type="submit" class='register-btn-index'data-toggle="modal" data-target="#successful" name="button" id="button" value="注册" />

                    </form>
                </div>

            </div>
        </div>
    </div>
<!--注册模态框结束-->

<!--登录模态框-->
<div class="modal fade" id="successful" tabindex="-1" role="dialog" aria-labelledby="modal-label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title" id="modal-label">登录</h4>
            </div>
            <div class="modal-body">
                <form name="register" id="register" method="post" action="login.php">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">登录名:</label>
                        <input type="text" placeholder="请输入邮箱..." name="login_email" class="form-control"
                               id="login_email" required="required">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">密码:</label>
                            <input type="password" placeholder="请输入密码..." name="login_pwd" class="form-control" id="login_pwd"
                                   required="required">

                    </div>
                    <input type="submit" class='register-btn-index'data-toggle="modal" data-target="#successful" name="button" id="button" value="登录" />

                </form>
            </div>

        </div>
    </div>
</div>

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
                            <img src="../images/blog-1.jpg" width="100%" height="100%" alt="1 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>First Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="../images/blog-2.jpg" width="100%" height="100%" alt="2 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="../images/blog-3.jpg" width="100%" height="100%" alt="3 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>Third Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="../images/blog-4.jpg" width="100%" height="100%" alt="4 slide">

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
                </div>
                <!--轮播图结束-->

                <div class="article-detail container-fluid">

                <?php
                    if(empty($data)){
                        echo "当前没有文章，请管理员在后台添加文章";
                    }else{
                        foreach($data as $value){
                ?>
                <!--文章列表-->
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
<!--个人信息-->
        <div class="tab-pane" id="tab-safari">
            <div class="row">
                <h4 class="main-title">
                    个人信息
                </h4>
                <div class="blog-sub-title row">
                    <div class="clear"></div>
                    <h3>黄娜珠</h3>
                    <div class="clear"></div>
                </div>
                <ul class="about-me col-sm-5">

                    <li>
                        <i class="glyphicon glyphicon-user"></i>
                        <label>Name</label>
                        <span class="value">黄娜珠</span>
                        <div class="clear"></div>
                    </li>

                    <li>
                        <i class="glyphicon glyphicon-calendar"></i>
                        <label>Date of birth</label>
                        <span class="value">10,10,1993</span>
                        <div class="clear"></div>
                    </li>

                    <li>
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <label>Adress</label>
                        <span class="value">JiangXi FuZhou</span>
                        <div class="clear"></div>
                    </li>

                    <li>
                        <i class="glyphicon glyphicon-envelope"></i>
                        <label>Email</label>
                        <span class="value">15851412061@163.com</span>
                        <div class="clear"></div>
                    </li>

                    <li>
                        <i class="glyphicon glyphicon-phone"></i>
                        <label>Phone</label>
                        <span class="value">15851412061</span>
                        <div class="clear"></div>
                    </li>

                    <li>
                        <i class="glyphicon glyphicon-globe"></i>
                        <label>Website</label>
                        <span class="value"><a href="#" target="_blank">www.Blog.com</a></span>
                        <div class="clear"></div>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="blog-sub-title row">
                    <div class="clear"></div>
                    <h3>我的相册</h3>
                    <div class="clear"></div>
                </div>

                <div id="divtest" >
                    <div class="content">
                        <div class="divPics">
                            <ul class="row">
                                <li class="col-sm-3">
                                    <a href="../images/red_galss.jpg" title="第1张">
                                        <img src="../images/red_galss.jpg" alt="" />
                                    </a>
                                </li>
                                <li class="col-sm-3">
                                    <a href="../images/cuteCat.jpg" title="第2张">
                                    <img src="../images/cuteCat.jpg" alt="" />
                                    </a>
                                </li>
                                <li class="col-sm-3">
                                    <a href="../images/shy.jpg" title="第3张">
                                    <img src="../images/shy.jpg" alt="" />
                                    </a>
                                </li>
                                <li class="col-sm-3">
                                    <a href="../images/lion_cat.jpg" title="第4张">
                                        <img src="../images/lion_cat.jpg" alt="" />
                                    </a>
                                </li>
                            </ul>
                            <ul class="row">

                                <li class="col-sm-3">
                                    <a href="../images/dog_yoga.jpg" title="第5张">
                                        <img src="../images/dog_yoga.jpg" alt="" />
                                    </a>
                                </li>
                                <li class="col-sm-3">
                                    <a href="../images/oil_flow.jpg" title="第6张">
                                        <img src="../images/oil_flow.jpg" alt="" />
                                    </a>
                                </li>
                                <li class="col-sm-3">
                                    <a href="../images/dolphin.jpg" title="第7张">
                                        <img src="../images/dolphin.jpg" alt="" />
                                    </a>
                                </li>
                                <li class="col-sm-3">
                                    <a href="../images/elephant.jpg" title="第8张">
                                        <img src="../images/elephant.jpg" alt="" />
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(function () {
                        $(".divPics a").lightBox({
                            overlayBgColor: "#666", //图片浏览时的背景色
                            overlayOpacity: 0.5, //背景色的透明度
                            containerResizeSpeed: 600 //图片切换时的速度
                        })
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="footer blog-footer">
        <div>&copy;sunnyPig</div>
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

            //新浪微博分享
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