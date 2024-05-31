<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');

foreach ($_POST as $i => $item) {
    echo $i . '->' . $item;
    echo "<br>";
    if ($item == null || $item == '') {
        echo "空值";
        header("location:insert.php?error=欄位不可為空");
        exit();
    }
}

$sql="insert into 
                students (
                    `school_num`,
                    `name`,
                    `birthday`, 
                    `uni_id`, 
                    `addr`, 
                    `parents`, 
                    `tel`, 
                    `dept`, 
                    `graduate_at`, 
                    `status_code`) 
                value(                     
                    '{$_POST['school_num']}', 
                    '{$_POST['name']}', 
                    '{$_POST['birthday']}', 
                    '{$_POST['uni_id']}', 
                    '{$_POST['addr']}', 
                    '{$_POST['parents']}', 
                    '{$_POST['tel']}', 
                    '{$_POST['dept']}', 
                    '{$_POST['graduate_at']}', 
                    '{$_POST['status_code']}')";


echo $sql;
echo $pdo->exec($sql);

header("location:index.php");

?>