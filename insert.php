<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增學員</title>
</head>

<body>

    <h1>新增學員</h1>
    <form action="save.php" method='post'>
        <div>
            <label for="school_num">學號：</label>
            <?php
            $max = $pdo->query("select max(`school_num`) as 'max' from `students`")->fetch(PDO::FETCH_ASSOC);
            echo $max['max'] + 1;
            ?>
            <input readonly type="hidden" min='1' name="school_num" id="school_num" value='<?= $max['max'] + 1; ?>'>
        </div>
        <div>
            <label for="name">姓名：</label><input type="text" name="name" id="name">
        </div>
        <div>
            <label for="birthday">生日</label><input type="text" name="birthday" id="birthday">
        </div>
        <div>
            <label for="uni_id">身份證號</label><input type="text" name="uni_id" id="uni_id">
        </div>
        <div>
            <label for="addr">地址</label><input type="text" name="addr" id="addr">
        </div>
        <div>
            <label for="parents">父母</label><input type="text" name="parents" id="parents">
        </div>
        <div>
            <label for="tel">電話</label><input type="text" name="tel" id="tel">
        </div>
        <div>
            <label for="dept">科系</label>
            <select name="dept" id="dept">
                <!-- <option value="1">商業經營科</option>
                <option value="2">國際貿易科</option>
                <option value="3">資料處理科</option>
                <option value="4">幼兒保育科</option>
                <option value="5">美容科</option>
                <option value="6">室內佈置科</option> -->
                <?php
                $depts = $pdo->query('select * from dept')->fetchALL();
                foreach ($depts as $dep) {
                    echo "<option value='{$dep['id']}'>{$dep['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="graduate_at">畢業學校</label>
            <select name="graduate_at" id="graduate_at">
                <?php
                $schools = $pdo->query('select * from graduate_school')->fetchAll();
                foreach ($schools as $school) {
                    echo "<option value='{$school['id']}'>{$school['county']}{$school['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="status_code">畢業狀態</label>
            <select name="status_code" id="status_code">
                <option value="001">畢業</option>
                <option value="002">補校</option>
                <option value="003">補結</option>
                <option value="004">結業</option>
            </select>
        </div>

        <input type="submit" value="新增"><input type="reset" value="重置">

    </form>
</body>

</html>