<?php
include('Link_sql.php');
// print_r(str_split($_POST['name']));
$arr1 = $_POST['name'];
$arr2 = $_POST['quan'];
$arr3 = $_POST['reason'];
// print_r($arr1[0]);
// echo $arr1;
for ($i = 0; $i < count($arr1); $i++) {
    $sql = "select * from product_list where p_name = '" . $arr1[$i] . "'";
    $index = 0;
    if ($result = mysqli_query($link, $sql)) {
        if ($row = mysqli_fetch_assoc($result)) $index = $row['id'];
        $sql = 'insert into refund (p_id, quan, reason) values ("' . $index . '", "' . $arr2[$i] . '", "' . $arr3[$i] . '")';
        if ($result = mysqli_query($link, $sql)) {
            $a['code'] = 0;
            $a['message'] = "成功";
        } else {
            $a['code'] = 1;
            $a['message'] = "失敗!" . $sql;
        }
        // mysqli_free_result($result); // 釋放佔用的記憶體
    }
}

$sql = "delete from p_order where id = '" . $_POST["id"] . "'";
if ($result = mysqli_query($link, $sql)) {
    $a['code'] = 0;
    $a['message'] = "成功";
} else {
    $a['code'] = 1;
    $a['message'] = "失敗!" . $sql;
}
mysqli_close($link); // 關閉資料庫連結
echo json_encode($a);
exit;
