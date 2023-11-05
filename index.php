<?php
//验证是否登录
require './controller/login/judgeLogin.php';

//连接数据库
require './controller/db/dbConnect.php';
$html = <<<EOT
<!doctype html>
<!--
            ◢＼　 ☆　　 ／◣
    　  　∕　　﹨　╰╮∕　　﹨
    　  　▏　　～～′′～～ 　｜
    　　  ﹨／　　　　　　 　＼∕
    　 　 ∕ 　　●　　　 ●　＼
      ＝＝　○　∴·╰╯　∴　○　＝＝
    　    ╭──╮　　　　　╭──╮
  ╔═∪∪∪═kasihappy's=cat═∪∪∪═╗
-->
<html lang="zh-CN">

<button id='select' onclick="window.location.href='controller/sql/doSelect.php?id=1'">go to select</button><br><br>
<button id='insert' onclick="window.location.href='view/doInsert.html'">go to insert</button><br><br>
<button id='update' onclick="window.location.href='view/update.html'">go to update</button><br><br>
<button id='delete' onclick="window.location.href='view/delete.html'">go to delete</button><br><br>
<button id='reflect' onclick="window.location.href='view/reflectXSS.html'">go to reflectXSS</button><br><br>
<button id='store' onclick="window.location.href='view/storeXSS.html'">go to storeXSS</button><br><br>
</html>
EOT;

echo $html;

