<?php
session_start();
//  这种方法是将原来注册的某个变量销毁
//unset($_SESSION['admin']);
unset($_SESSION['authorized']);
session_destroy();
?>