<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_15") or die("無法開啟MySQL資料庫連結!<br>");
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
$price = array(1 => "1680", "1580", "1380", "1680", "1680", "2150", "220", "250", "650", "1880", "2980", "1580");
$p_name = array(
    1 => "【客製化蛋糕】酒鬼系列蛋糕-絕對伏特加", "【客製化蛋糕】酒鬼系列蛋糕-jack daniel", "【客製化蛋糕】藍色海洋風格蛋糕",
    "【客製化蛋糕】男人系冷色調風格蛋糕", "【客製化蛋糕】男人系灰色風格蛋糕", "【客製化蛋糕】人魚公主蛋糕", "【旅行蛋糕】紅酒莓果蛋糕", "【經典系列】乳酪布朗尼", "10入草莓系列達克瓦茲禮盒", "【客製化蛋糕】酒鬼系列蛋糕-格瑪蘭", "【客製化蛋糕】權力遊戲卓耿蛋糕", "【客製化蛋糕】迷霧金磚"
);
// if ($_POST['stud_sex'] == 0) {
// 	$sex = "F";
// } else {
// 	$sex = "M";
// }
for ($i = 1; $i <= 12; $i++) {
    $sql = "update product_list set file_name = 'product_pic/no" . $i . ".svg' where (id=" . $i . ")";
    //$sql = "insert into product_list values($i, '" . $p_name[$i] . "', " . $price[$i] . ", " . mt_rand(10, 30) . ")";
    if ($result = mysqli_query($link, $sql)) {
        echo "<script>alert('資料新增成功!');location.href='tmp.php';</script>";
    } else {
        echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
    }
}
//echo $sql;
//$sql = "insert into students values('" . $_POST['stud_no'] . "','" . $_POST['stud_name'] . "','" . $sex . "','" . $_POST['stud_addr'] . "')";
// 送出查詢的SQL指令


mysqli_close($link); // 關閉資料庫連結
