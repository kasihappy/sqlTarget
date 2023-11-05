<?php
//连接数据库
require '../db/dbConnect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = '{$id}'";
$result = mysqli_multi_query($conn, $sql);
$first = true;
if ($result){
    do {
        if (!$first){
            mysqli_next_result($conn);
        } else{
            $first = false;
        }
        $res = mysqli_store_result($conn);
        if ($res){
            while ($row = $res->fetch_row()){
                foreach ($row as $data){
                    echo $data."&nbsp;&nbsp;";
                }
                echo "<br>";
            }
            $res->close();
        }
        if (mysqli_more_results($conn))
            echo "----------------------<br>";
    } while(mysqli_more_results($conn));

} else {
    echo "sql语句执行失败了，看看是否存在问题";
}