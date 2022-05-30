<!DOCTYPE html>
<html lang="en">
<?php
$link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
$sql = "SHOW TABLES FROM group_15";
// 送出查詢的SQL指令
if ($result = mysqli_query($link, $sql)) {
    $num = mysqli_num_rows($result);
    $data = "";
    while ($row = mysqli_fetch_array($result)) {
        $data .= "<option value=\"$row[0]\">" . $row[0] . "</option>";
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<style>
    form {
        display: flex;
    }

    fieldset {
        display: flex;
        width: fit-content;
        flex-wrap: nowrap;
    }

    select {
        font-size: 16pt;
        color: blue;
        width: 100pt;
        line-height: 1.5em;
        font-family: monospace;
        display: flex;
    }
</style>
<script>
    function SQL_submit(tb_name) {
        top.top1.document.query.sql.value = "select * from " + tb_name;
    }

    function SQL_Syn(tb_name, query) {
        var str = "";
        if (query == "select") str = "select * from " + tb_name;
        else if (query == "insert") str = "insert into " + tb_name + " (colume1, column2) values (x1, x2)";
        else if (query == "update") str = "update " + tb_name + " set c1 = x1 where()";
        else if (query == "delete") str = "delete from " + tb_name + " where";
        top.top1.document.query.sql.value = str;
    }
</script>

<body>
    <form name="form2" action="" method="post">
        <div class="form-group col-md-6">
            <label for="s1">Table Name</label>
            <select multiple class="form-control" name="select" id="s1" size="6" onclick="SQL_submit(this.value)">
                <?php echo $data; ?>
            </select>
        </div>
        
        <div class="form-group col-md-6">
            <label for="s1">Options</label>
            <select multiple class="form-control" name="s2" size="6" onclick="SQL_Syn(s1.value, this.value)">
            <option value="select">select </option>
            <option value="insert">insert </option>
            <option value="update">update </option>
            <option value="delete">delete </option>
            </select>
        </div>
    </form>
</body>

</html>