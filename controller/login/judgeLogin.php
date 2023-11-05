<?php
//验证是否登录，若无登陆则跳转到登陆页面
session_start();
if (!isset($_SESSION['username'])){
    header('Location:http://10.10.17.18:2001/sqlTarget/view/login.html');
    exit;
}