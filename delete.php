<?
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');

$row = $pdo->query("select * from `students` where `id`='{$_GET['id']}'")->fetch();
// 刪除前先查好刪除資料，不然刪除完就撈不到資料了
$response = "?name={$row['name']}&num={$row['school_num']}";

$sql= "delete from `students` where `id` ='{$_GET['id']}'";

$pdo->exec($sql);

header("location:index.php" . $response);

?>