<?php
//连接数据库
require 'dbConnect.php';

$content = trim(urldecode($_POST['content']));
$sql = "INSERT INTO store(content) VALUES ('$content')";
echo "your sql sentence is: ".$sql."<br><br>";
$result = mysqli_multi_query($conn, $sql);
echo "----------------------------";
echo "auto show all values stored";
echo "----------------------------<br>";
$sql = "SELECT * FROM store";
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
