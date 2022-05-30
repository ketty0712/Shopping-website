<?php
session_start();
include('Link_sql.php');
// 送出查詢的SQL指令
$keyw="";
if(isset($_POST['keyw']))
    $keyw=$_POST['keyw'];
$keyw="%".$keyw."%";
if ($result = mysqli_query($link, "SELECT * FROM product_list where p_name like '".$keyw."' or p_intro_long like '".$keyw."' or p_intro like '".$keyw."' order by id")) {
    $total_records = mysqli_num_rows($result);
    $data = '';
    for ($i = 0; $i < $total_records; $i++) {
        if ($row = mysqli_fetch_assoc($result)) {
            $data .= '<div class="col"><div class="card shadow-sm"><a href="Products/Product_template.php?product_no=' . $row['id'] . '" class="bd-placeholder-img card-img-top">';
            $data .= '<img src= ' . $row['file_name'] . ' width="100%"></a><div class="card-body">';
            $data .= '<p class="card-text">' . $row['p_name'] . "</p><div class='d-flex justify-content-between align-items-center'><mark class=\"text-body\">NT$ " . $row['p_price'] . " </mark></div>"."<div id='stock' style='display:none;'>".$row['stock']."</div>";
            if (isset($_SESSION['user_name']))
                        $data .= '<div class="btn-group d-flex justify-content-between align-items-center"><button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]" id="' . $row['id'] . '">Add in Cart</button></div>';
                    else
                        $data .= '<div class="btn-group d-flex justify-content-between align-items-center"><button type="button" class="btn btn-sm btn-outline-secondary" onclick="tologin();">Add in Cart</button></div>';
            $data .= '</div></div></div>';
        }
    }
    if($total_records>0)
        echo json_encode($data);
    else
        echo json_encode("<div class='col' style='width:100%; text-align:center; font-size:26px'><h7>沒有找到關鍵字商品!<h7></div>");
    mysqli_free_result($result); // 釋放佔用的記憶體
} else {
    echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
}
?>