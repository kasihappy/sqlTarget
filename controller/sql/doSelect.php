<?php
//连接数据库
require '../db/dbConnect.php';
$id = $_GET['id'];
$sql = "SELECT title, content FROM posts WHERE id = '{$id}'";
try {
    $result = mysqli_multi_query($conn, $sql);
} catch (Exception $e){
    echo "sql语句执行错误，看看是否存在问题？或者是否被破坏数据库？";
    echo "你的sql语句为:<br> ".$sql."<br><br>";
    die(0);
}
echo "sql语句执行成功，你的sql语句为:<br> ".$sql."<br><br>";
echo "标题&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;内容<br>";

$first = true;
if ($result) {
    do {
        if (!$first) {
            mysqli_next_result($conn);
        } else {
            $first = false;
        }
        $res = mysqli_store_result($conn);
        if ($res) {
            while ($row = $res->fetch_row()) {
                echo "--------<br>";
                foreach ($row as $data) {
                    echo $data . "&nbsp;&nbsp;";
                }
                echo "<br>";
            }
            $res->close();
        }
        if (mysqli_more_results($conn))
            echo "----------------------<br>";
    } while (mysqli_more_results($conn));

} else {
    echo "sql语句执行失败了，看看是否存在问题";
}
