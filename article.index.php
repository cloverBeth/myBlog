<?php

require_once('connect.php');
//require_once ('article.showDetail.php');
$sql = "select * from article order by dateline desc";//按照文章发布顺序排
$query = mysqli_query($con,$sql);
if($query&&mysqli_num_rows($query)){//mysqli_num_rows($query)检验结果集数据条数
    while($row = mysqli_fetch_assoc($query)){
        $data[] = $row;//保存到数组$data[]
    }
}

//$id=mysqli_result("select * from comment",0);

$topic="select * from article where preg_id=id";
//echo $id;

//ini_set('date.timezone','Asia/Shanghai');//设置时区
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
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">MyBlog</a></li>
                    <li><a href="#MyBlog">linktwo</a></li>
                </ul>
                <form class="navbar-form"action="article.index.php"method="post">
                    <div class="form-group">
                        <input type="text" placeholder="用户名..." class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="密码..." class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">登录</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="content-wrapper container-fluid">
<!--Mylog begin-->
        <div id="MyBlog" class="">
            <h3 class="main-title">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Blog - My Blog
            </h3>

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
                            <img src="src/images/blog-1.jpg" width="100%" height="100%" alt="1 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>First Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="src/images/blog-2.jpg"  width="100%" height="100%" alt="2 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="src/images/blog-3.jpg" width="100%" height="100%" alt="3 slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h4>Third Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="src/images/blog-4.jpg" width="100%" height="100%" alt="4 slide">

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
    <!--                    <li><i class="glyphicon glyphicon-tag"></i> jquery, slider, web design</li>-->
                    </ul>
                    <h5 class="article-description row">副标题:<?php echo $value['description']?></h5>
                    <div class="read-more row">
                        <a href="article.showDetail.php?id=<?php echo $value['id']?>" class="more col-sm-4">Read More <i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
<!--Myblog end-->
</body>
</html>