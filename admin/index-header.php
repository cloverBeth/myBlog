<!--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">-->
<!--    <div class="container">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"-->
<!--                    data-target="#example1">-->
<!--                <span class="sr-only">Toggle navigation</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a href="#" class="navbar-brand"id="brand-rain"></a>-->
<!--            <span class="title-blog">我的博客 </span class>-->
<!--        </div>-->
<!--        <div class="collapse navbar-collapse"id="example1">-->
<!--            <ul class="nav navbar-nav"id="nav-style">-->
<!--                <li class=""><a href="article.index.php">MyBlog</a></li>-->
<!--                <li><a href="article.index.php">AboutMe</a></li>-->
<!--            </ul>-->
<!--            <form class="navbar-form" action="login.php" method="post">-->
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
<!--                <a href="#" class="btn btn-default" data-toggle="modal"-->
<!--                   data-target="#about-modal">注册</a>-->
<!--                <div class="welcome">-->
<!--                    <span> --><?php //echo $_SESSION['email']; ?><!-- , 欢迎回来! </span>-->
<!--                    <a href="#" onclick="return --><?php //session_destroy();?><!-- "class="login-out">退出登录</a>-->
<!--                </div>-->
<!--            </form>-->
<!---->
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->
<!--</nav>-->
<!---->
<!--<!--注册模态框开始-->-->
<!--<div class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label"-->
<!--     aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal"><span-->
<!--                        aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>-->
<!--                <h4 class="modal-title" id="modal-label">注册</h4>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form name="register" id="register" method="post" action="resgister.php">-->
<!--                    <div class="form-group">-->
<!--                        <label for="recipient-name" class="control-label">邮箱注册:</label>-->
<!--                        <input type="email" placeholder="请输入注册邮箱" name="reg_email" class="form-control" id="reg_email"-->
<!--                               required="required">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="message-text" class="control-label">密码:</label>-->
<!--                        <input type="password" name="reg_pwd" placeholder="请输入密码" class="form-control" id="reg-pwd"-->
<!--                               required="required">-->
<!---->
<!--                    </div>-->
<!--                    <!--                        <a href="#" data-toggle="modal" data-target="#successful">-->-->
<!--                    <input type="submit" data-toggle="modal" data-target="#successful" name="button" id="button" value="注册" />-->
<!--                    <!--                        </a>-->-->
<!---->
<!--                </form>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<script src="../bower_components/jquery/dist/jquery.min.js"></script>-->
<!--<script>-->
<!--    $(document).ready(function (){-->
<!--        $("ul#nav-style li").each(function(index){-->
<!--            $(this).click(function(){-->
<!--                alert('1k');-->
<!--                $("ul#nav-style li").removeClass("active");-->
<!--                $("li").eq(index).addClass("active");-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->

<?=phpinfo()?>