<?php
require_once('connect.php');
//require_once ('admin/comment.class.php');
$id = intval($_GET['id']);//intval()转换为整数类型
$sql = "select * from article where id=$id";


$timeline=time();
if($_POST['submit']){
    $sqlcom = "insert into comment(username,email,content,pubTime,topic_id) values ('$_POST[comment_author]','$_POST[email]','$_POST[comment]',$timeline,$id)";
    $sq=mysqli_query($con,$sqlcom);
//    if (!$sq) {
//        printf("Error: %s\n", mysqli_error($con));
//        exit();
//    }
    echo "
    <div class='alert alert-success alert-dismissible col-lg-5 col-sm-5 col-md-5' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong>评论成功!</strong>
    </div>
";
}

$listsql = "select * from comment where topic_id=$id";
$list = mysqli_query($con,$listsql);

//$commens = mysqli_fetch_array($list);
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
                <li class="active"><a href="article.index.php">MyBlog</a></li>
                <li><a href="article.index.php">linktwo</a></li>
            </ul>
            <form class="navbar-form"action="article.list.php"method="post">
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
    </div>
    <!--轮播图结束-->


    <div class="article-detail container-fluid">

        <div class="article-repeat row">

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
                            <img src="src/images/header.png" width="100" height="100" alt="img" />
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
                                <input type="text" class="form-control"name="comment_author" id="comment_author" value=""placeholder="请输入昵称" tabindex="1" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label required">Your email</label>
                            <div class="col-sm-6 col-lg-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="请输入合法邮箱" value="" tabindex="2" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label required">Your message</label>
                            <div class="col-sm-6 col-lg-6">
                                <textarea name="comment" id="comment" class="form-control" rows="8" tabindex="2"placeholder="请输入您的评论..."  required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-sm-offset-2 col-sm-4 col-lg-6">
                                <input type="hidden" name="comment_post_ID" value="<?php echo $commens['topic_id']?>" id="comment_post_ID" />
                                <input name="submit" class="comBtn"type="submit" value="Submit comment" />
                            </div>
                        </div>
                    </form>

                </div>

            </section>

        </div>
    </div>

</div>

<!--Myblog end-->

</body>
</html>