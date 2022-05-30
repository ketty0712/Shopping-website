<?php
include('Link_sql.php');
$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
if ($_POST['oper'] == "delete")
    $sql = 'delete from board where id=' . $_POST['id'];
if ($_POST['oper'] == "update")
    $sql = "update board set content = '" . $_POST['content'] . "' where id='" . $_POST['id'] . "'";
if ($result = mysqli_query($link, $sql)) {
    $a["code"] = 0;
    $a["message"] = "資料" . $arr_oper[$_POST['oper']] . "成功!" . $sql;
} else {
    $a["code"] = mysqli_errno($link);
    $a["message"] = "資料" . $arr_oper[$_POST['oper']] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
}

mysqli_close($link); // 關閉資料庫連結

echo json_encode($a);
exit;
?>