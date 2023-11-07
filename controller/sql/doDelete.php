<?php
//连接数据库
require '../db/dbConnect.php';

$id = $_GET['id'];
$sql = "DELETE FROM posts WHERE id='$id'";
echo "your sql sentence is: ".$sql."<br><br>";
$result = mysqli_multi_query($conn, $sql);
echo '成功删除，小心造成了破坏，快去检查一下';
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

// 防止删除之后id不连续的情况
$sql = "SET @auto_id = 0;
UPDATE 表名 SET 自增字段名 = (@auto_id := @auto_id + 1);
ALTER TABLE 表名 AUTO_INCREMENT = 1;
";
$result = mysqli_multi_query($conn, $sql);
