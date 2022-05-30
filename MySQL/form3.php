<?php
session_start();
error_reporting(0);
$sql = strtolower(stripslashes(trim($_POST['sql'])));
if (!isset($sql)) $sql = $_SESSION['sql'];
else $_SESSION['sql'] = $sql;

if ($_SESSION['sql'] != NULL) {
    $link = mysqli_connect("localhost", "root", "root123456", "group_15") or die("無法開啟MySQL資料庫連結!<br>");
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'big5_chinese_ci'");

    // 送出查詢的SQL指令
    if ($result = mysqli_query($link, $sql)) {

        $data = "<span style='color:blue'>SQL指令執行成功!</span>";
        if (substr($sql, 0, 6) != "select")  $data .= "<center>影響記錄數: " . mysqli_affected_rows($link) . "筆";  //非select 語法
        else {
            $data .= "(共 <span style='color:blue'>" . mysqli_num_rows($result) . "</span>筆)";
            $data .= "<table border=1 width='80%' align='center'><tr align='center'>";
            $f = false;
            while ($finfo = $result->fetch_field()) {
                $data .= "<td>$finfo->name</td>";
                if ($finfo->name == "file_name") $f = true;
            }
            $data .= "</tr>";
            $total_records = mysqli_num_rows($result); //總筆數
            $field_count = mysqli_num_fields($result);
            $total_page = ceil($total_records / 10); //計算頁數
            // if (!isset($_GET['page'])) $[a] = 0;
            if (isset($_GET['page']))
                mysqli_data_seek($result, ($_GET['page'] - 1) * 10); //指標移至該頁第一筆記錄

            for ($j = 1; $j <= $total_records; $j++) {
                $row = mysqli_fetch_row($result);
                $data .= "<tr align='center'>";
                for ($i = 0; $i < $field_count; $i++) {
                    if ($f == true && $i == 4) {
                        $data .= "<td><img src='../$row[$i]' /></td>";
                    } else $data .= "<td>$row[$i]</td>";
                }
                $data .= "</tr>";
            }

            //顯示頁碼超連結
            // $data .= "<tr align='center'><td colspan=\"$field_count\">";
            // for ($i = 1; $i <= $total_page; $i++) {
            //     if ($i == $_GET['page'] || ($i == !isset($_GET['page']) && $i == 1)) {
            //         $data .= "$i&nbsp;&nbsp;";
            //     } else {
            //         $data .= "<a href='" . $_SERVER['PHP_SELF'] . "?page=$i'> $i </a>&nbsp;&nbsp;";
            //     }
            // }
            // $data .= "</td></tr>";

            $data .= "</table>";
            if ($f) {

            }
            $sort = "alter table" . $result->table . "AUTO_INCREMENT=$total_records;";
            mysqli_query($link, $sort);
        }
    } else   $data .= "<span style='color:red'>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</span>";

    mysqli_close($link); // 關閉資料庫連結  
}

?>
<style>
    img {
        width: 100pt;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<style>
    td {
        min-width: 50pt;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL</title>
</head>

<body>
    <!-- <table align="center" width="80%" border="1"> -->

    <?php echo $data; ?>
    <!-- </table> -->
</body>

</html>