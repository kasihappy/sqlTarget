<?php
header('Content-Type:text/html;charset=utf-8');

//登陆界面

//连接数据库
require 'dbConnect.php';
//判断表单的提交
if (isset($_POST['username']) && isset($_POST['password'])){
    //查询用户
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $sql = "select id, username, password from users 
            where username = '$username' and password = '$pwd';";
    $result = $conn->query($sql);
    if(!$result->num_rows) {
        echo "<script>alert('账号或密码错误');location='login.html'</script>";
    }else {
        //登陆成功，跳转首页
        session_start();
        $_SESSION['username'] = $_POST['username'];
        echo "<script>alert('welcome');location='index.php'</script>";
    }
} else {
    echo "<script>alert('好像发生了一些错误，你的表单没有提交成功，再试试吧~');location='login.html'</script>";
}
