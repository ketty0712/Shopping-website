<?php
$user = trim($_GET["user_name"]);
include('Link_sql.php');
$sql = "SELECT * FROM m_info where username='$user' "; // 指定SQL查詢字串

// 送出查詢的SQL指令
if ($result = mysqli_query($link, $sql)) {
   if ($row = mysqli_fetch_assoc($result)) {
      echo "1";//帳號已存在
   }
   else {
      echo "0";//帳號不存在
   }
   mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
?>