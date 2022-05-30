
<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

// $arr_sex = array('F' => '女', 'M' => '男');
$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
    // $sql = "select MAX(id) as id from p_order";
    // if ($result = mysqli_query($link, $sql)) {
    //     $row = mysqli_fetch_row($result);
    //     $id_max = $row['id'];
    //     for ($i = 0; $i <= $id_max; $i++) {
    //         $sql = "select p_order.id, mem_no, m_info.name, p_no, p_name, quan from p_order inner join product_list join m_info
    //         on p_order.p_no = product_list.id and p_order.mem_no = m_info.no having p_order.id = $i order by p_order.id";
    //         if ($result = mysqli_query($link, $sql) && mysqli_num_rows($result) > 0) {

    //         }
    //     }
    // }
    $sql = "select p_order.id, mem_no, m_info.name, p_no, p_name, quan from p_order inner join product_list join m_info
    on p_order.p_no = product_list.id and p_order.mem_no = m_info.no
    order by p_order.id";
    //   $sql = "select * from p_order";
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $a['data'][] = array($row['id'], $row['mem_no'], $row["name"], $row['p_name'], $row["p_no"], $row["quan"], "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結

    echo json_encode($a);
    exit;
}
// if ($oper == "insert") {
//     $sql = "insert into p_order(id,mem_no,p_no, quan) values ('" . $_POST['order_id'] . "','" . $_POST['member_id'] . "','" . $_POST['product_id'] . "','" . $_POST['product_quantity'] . "')";
// }
// if ($oper == "update") {
//     $sql = "update p_order set id='" . $_POST['order_id'] . "',mem_no='" . $_POST['member_id'] . "',p_no='" . $_POST['product_id'] . "',quan='" . $_POST['product_quantity'] . "' where id='" . $_POST['order_id'] . "'";
// }

if ($oper == "delete") {
    $sql = "delete from p_order where id='" . $_POST['old_no'] . "' and p_no='" . $_POST['product_id'] . "'";
} else {
    $sql = "select * from p_order where id = " . $_POST['order_id'] . " and p_no = " . $_POST['product_id'];
    if ($result = mysqli_query($link, $sql)) {
        $total = mysqli_num_rows($result);
        if ($total > 0) {
            $oper = "update";
            $sql = "update p_order set p_no='" . $_POST['product_id'] . "',quan='" . $_POST['product_quantity'] . "' where id='" . $_POST['order_id'] . "' and p_no='" . $_POST['product_id'] . "'";
        } else {
            $sql = "select MAX(id) as id from p_order";
            if ($result = mysqli_query($link, $sql)) {
                $row = mysqli_fetch_row($result);
                if ($_POST['order_id'] > $row[0]) {
                    $id = $row[0] + 1;
                } else {
                    $id = $_POST['order_id'];
                }
                $sql = "insert into p_order(id,mem_no,p_no, quan) values ('" . $id . "','" . $_POST['member_id'] . "','" . $_POST['product_id'] . "','" . $_POST['product_quantity'] . "')";
            }
        }
    }
}
if (strlen($sql) > 10) {
    if ($result = mysqli_query($link, $sql)) {
        $a["code"] = 0;
        $a["message"] = "資料" . $arr_oper[$oper] . "成功!" . $sql;
    } else {
        $a["code"] = mysqli_errno($link);
        $a["message"] = "資料" . $arr_oper[$oper] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
    }
    mysqli_close($link); // 關閉資料庫連結

    echo json_encode($a);
    exit;
}
?>