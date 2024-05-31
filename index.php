<a href="insert.php">新增學員</a>

<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');

$sql = "select * from `students` where `id` <30";

// query查找 fetch抓取
$db = $pdo->query($sql);
// $rows=$pdo->query($sql)->fetch();
$rows = $db->fetchAll();


// var_dump($rows);

// echo "<pre>";
// print_r($rows);
// echo "</pre>"; 

// echo "<table border='1'>";
// echo "<tr>";
// foreach($rows as $key => $value ){
//     echo "<td> $key </td>";
// }
// echo "</tr>";   

// foreach($rows as $value ){
// echo "<tr>";
// foreach($value as $v){
//     echo "<td> $v </td>";
// } 
//     echo "</tr>";   
// }
// echo "</table>";

echo "<table border='1'>";
echo "<tr>";
echo "<td>id</td>";
echo "<td>學號</td>";
echo "<td>姓名</td>";
echo "<td>生日</td>";
echo "<td>身份證號</td>";
echo "<td>地址</td>";
echo "<td>父母</td>";
echo "<td>電話</td>";
echo "<td>科系</td>";
echo "<td>畢業學校</td>";
echo "<td>畢業狀態</td>";
echo "<td></td>";
echo "</tr>";
foreach ($rows as $row) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['school_num']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['birthday']}</td>";
    echo "<td>{$row['uni_id']}</td>";
    echo "<td>{$row['addr']}</td>";
    echo "<td>{$row['parents']}</td>";
    echo "<td>{$row['tel']}</td>";
    echo "<td>{$row['dept']}</td>";
    echo "<td>{$row['graduate_at']}</td>";
    echo "<td>{$row['status_code']}</td>";
    echo "<td>";
    echo "<a herf='edit.php?id={$row['id']}'  style='margin:0 5px;color:red;'>編輯</a>"; 
    echo "<a href='delete.php?id={$row['id']}' style='margin:0 5px;color:red;'>刪除</a>";
    echo "</td>";

    echo "</tr>";
}

echo "</table>";
