<?php
// search_mem_product_ajax
$link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
$oper = $_POST['oper'];
$a['code'] = 0;
$a['message'] = "";
if (isset($_POST['member_id']) && $oper == 'search_mem' && strlen($_POST['member_id']) > 0) {
    $sql = "select * from m_info where no = '" . intval($_POST['member_id']) . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $a['message'] .= $row['name'];
        }
        else{
            $a['message'] .='';
        }
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
    mysqli_close($link); // 關閉資料庫連結
    $a['code'] = 1;
    echo json_encode($a);
    exit;
}
if (isset($_POST['product_id']) && $oper == 'search_product') {
    $sql = "select * from product_list where id = '" . $_POST['product_id'] . "'";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_row($result);
        $a['message'] .= $row[1];
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
    mysqli_close($link); // 關閉資料庫連結
    $a['code'] = 1;
    echo json_encode($a);
    exit;
}
