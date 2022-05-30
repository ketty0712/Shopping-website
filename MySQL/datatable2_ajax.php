
<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
      or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

// $arr_sex = array('F' => '女', 'M' => '男');
$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from m_info";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row['no'], $row["name"], $row["username"], $row["password"], $row["mobile"], "<div style=\"display:inline;\"><button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button></div> ");
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}

if ($oper == "insert") {
      $sql = "insert into m_info(name,username,password, mobile) values ('" . $_POST['name'] . "','" . $_POST['username'] . "','" . $_POST['password'] . "','" . $_POST['mobile'] . "')";
}

if ($oper == "update") {
      $sql = "update m_info set name='" . $_POST['name'] . "',username='" . $_POST['username'] . "',password='" . $_POST['password'] . "',mobile='" . $_POST['mobile'] . "' where no='" . $_POST['old_no'] . "'";
}

if ($oper == "delete") {
      $sql = "delete from m_info where no='" . $_POST['old_no'] . "'";
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
<script>
      // function checksize() {
      //       $(".dataTables_scroll").find(".table:eq(0)").find("tr:eq(0) th:eq(0)").width("50");
      //       var tb = $(".dataTables_scroll").find(".table:eq(1)");
      //       var c = 0;
      //       tb.find('tr').each(function() {
      //             var tdArr = $(this).children();
      //             tdArr.eq(0).width("50");
      //       });
      // }
      $(function() {
            $(window).resize(function() {
                  checksize();
            })
            $("#example_wrapper").load(function() {
                  checksize();
            })
      });
</script>