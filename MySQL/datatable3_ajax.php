<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

// $arr_sex = array('F' => '女', 'M' => '男');
$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$file_name = "";
$oper = $_POST['oper'];
$a['info'] = "";

if ($oper == "query") {
    $sql = "select * from product_list";
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $a['data'][] = array(
                $row['id'], $row["p_name"], $row["p_price"], $row["stock"], $row['file_name'],
                "<div id='p_intro_1'>" . $row['p_intro'] . "</div>", "<div id='p_intro_2'>" . $row['p_intro_long'] . '</div>',
                "<div style=\"display: inline;\">
                <button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'>
                </i> 
                修改</button> 
                <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>
                刪除</button>
                </div>"
            );
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
    echo json_encode($a);
    exit;
} else {
    if (!empty($_FILES['product_picture']['name'])) {
        if ($_FILES['product_picture']['error'] === UPLOAD_ERR_OK) {
            // echo '檔案名稱: ' . $_FILES['product_picture']['name'] . '<br/>';
            // echo '檔案類型: ' . $_FILES['product_picture']['type'] . '<br/>';
            // echo '檔案大小: ' . ($_FILES['product_picture']['size'] / 1024) . ' KB<br/>';
            // echo '暫存名稱: ' . $_FILES['product_picture']['tmp_name'] . '<br/>';

            # 檢查檔案是否已經存在
            if (file_exists('D://xampp/htdocs/HW/product_pic/' . $_FILES['product_picture']['name'])) {
                //   echo '檔案已存在。<br/>';
            } else {
                $file = $_FILES['product_picture']['tmp_name'];
                $dest = 'D://xampp/htdocs/HW/product_pic/' . $_FILES['product_picture']['name'];

                # 將檔案移至指定位置
                move_uploaded_file($file, $dest);
            }
            $file_name = "product_pic/" . $_FILES['product_picture']['name'];
            $_POST['old_file'] = $file_name;
        } else {
            echo '錯誤代碼：' . $_FILES['product_picture']['error'] . '<br/>';
        }
    } else if (isset($_POST['old_file'])) {
        $a['info'] .= "空的 ";
        $file_name = $_POST['old_file'];
    }
    // else if ($_FILES['product_picture']['error'] == UPLOAD_ERR_NO_FILE) {
    //     $a['info'] .= "空的";
    //     $file_name = $_POST['old_file'];
    // }
}
// 取得副檔名
// $new_array = explode(".", $_FILES['product_picture']['name']);
// $ext = end($new_array);

// $target_dir = "D://xampp/htdocs/HW/product_pic/test/"; // 目標路徑
// $new_filename = time() . "_" . rand(10, 100) . "." . $ext; // 新的檔名
// $target_file = $target_dir . $new_filename; // 存的位置 + 檔名
// move_uploaded_file($_FILES["product_picture"]["tmp_name"], $target_file);

if ($oper == "insert") {
    $sql = "insert into product_list(p_name,p_price,stock, file_name, p_intro, p_intro_long) values ('" . $_POST['product_name'] . "','" . $_POST['product_price'] . "','"
        . $_POST['product_stock'] . "','" . $file_name . "','" . nl2br($_POST['intro']) . "','" . nl2br($_POST['intro_long']) . "')";
}
if ($oper == "update") {
    $sql = "update product_list set p_name='" . $_POST['product_name'] .
        "',p_price='" . $_POST['product_price'] .
        "',stock='" . $_POST['product_stock'] .
        "',file_name='" . $file_name .
        "',p_intro='" . nl2br($_POST['intro']) .
        "',p_intro_long='" . nl2br($_POST['intro_long']) .
        "' where id='" . $_POST['old_no'] . "'";
}

if ($oper == "delete") {
    $sql = "delete from product_list where id='" . $_POST['old_no'] . "'";
}

if (strlen($sql) > 10) {
    if ($result = mysqli_query($link, $sql)) {
        $a["code"] = 0;
        $a["message"] = "資料" . $arr_oper[$oper] . "成功!" . $sql;
        $a['info'] .= $file_name;
    } else {
        $a["code"] = mysqli_errno($link);
        $a["message"] = $sql . "資料" . $arr_oper[$oper] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
        $a['info'] .= $file_name;
    }

    mysqli_close($link); // 關閉資料庫連結

    echo json_encode($a);
    exit;
}
