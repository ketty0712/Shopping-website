<?php
$m = '';
if (isset($_POST['email']) && !isset($_POST['send_op']) && !isset($_POST['send_req'])) {
    $m = $_POST['email'];
    include('Link_sql.php');
    $sql = "SELECT username FROM m_info where email = '" . $m . "'";
    if ($result = mysqli_query($link, $sql)) {
        $total_records = mysqli_num_rows($result);
        if ($total_records > 0) {
            $arr_name["name"][] = '<h6>請選擇您要找回密碼的帳號：</h6>';
            for ($i = 0; $i < $total_records; $i++) {
                $row = mysqli_fetch_row($result);
                $fname = $row[0];
                $arr_name["name"][] = '<label style="width:100%"><h6 class="n_shadow">用戶名稱(帳號)：' . $fname . '</h6><input type="radio" name="groupu[]" style="display:none;" value="' . $i . '"></label>';
            }
            $arr_name["name"][] = '<button class="btn btn-primary" style="border-radius: 10px; float:right;" id="s_mail">確認</button>';
            $arr_name["name"][] = '<button class="btn btn-primary" style="border-radius: 10px; float:right;" id="re">上一頁</button>';
        } else {
            $arr_name["name"][] = '<h6>沒有找到該用戶！<h6>';
            $arr_name["name"][] = '<button class="btn btn-primary" style="border-radius: 10px; float:right;" id="re">上一頁</button>';
        }
        mysqli_free_result($result);
    } else {
        $arr_name["name"][] = '資料庫連線失敗';
    }
    mysqli_close($link);
    echo json_encode($arr_name);
} else if (isset($_POST['send_op'])) {
    include('Link_sql.php');
    $user_no = (int)$_POST['send_op'];
    $to = $_POST['email'];
    $sql = "SELECT password FROM m_info where email = '" . $to . "'";
    $pwd = '';
    if ($result = mysqli_query($link, $sql)) {
        $total_records = mysqli_num_rows($result);
        for ($i = 0; $i < $total_records; $i++) {
            $row = mysqli_fetch_row($result);
            if ($user_no == $i) {
                $pwd = $row[0];
                $subject = "=?UTF-8?B?" . base64_encode('Skoff。找回密碼') . "?="; //信件標題，解決亂碼問題
                mail($to, $subject, "感謝您使用Skoff！您的密碼:" . $pwd) or die("郵件傳送失敗！");
            }
        }
        mysqli_free_result($result);
        mysqli_close($link);
        echo json_encode('<div id="send_mail"><h6 style="color:green;">密碼已經送到您的信箱！快去確認吧！<h6></div>');
    }
} else if (isset($_POST['send_rep'])) {
    $f1=$_POST['send_rep'];
    $style=strpos($f1,"</style>")+9;
    $f1=substr($f1,0,$style).'</head>'.substr($f1,$style);
    $head_index=strpos($f1,"</head>")+7;
    $f1=substr($f1,0,$head_index).'<body>'.substr($f1,$head_index);
    $f1="<!DOCTYPE html><html lang=\"en\"><head>".$_POST['send_rep']."</body></html>";

    $header="MIME-Version:1.0\r\n";
    $header.="Content-Type:text/html;charset=utf-8\r\n";
    
    
    // $f1 = file_get_contents('FAQ.html');
    $to = "S0754017@gm.ncue.edu.tw";
    $subject = "=?UTF-8?B?" . base64_encode('Skoff。問題回報') . "?="; //信件標題，解決亂碼問題
    mail($to, $subject, $f1,$header) or die("郵件傳送失敗！");
    echo json_encode($f1);
}
