<?php
//连接数据库
require '../db/dbConnect.php';

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$sql = "INSERT INTO posts(author, title, content) VALUES ('$author', '$title', '$content')";
echo "your sql sentence is: ".$sql."<br><br>";
$result = mysqli_multi_query($conn, $sql);
echo "你也许想在select部分看看你是否成功insert";
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
