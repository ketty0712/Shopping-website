<?php
   if ($_FILES['product_picture']['error'] === UPLOAD_ERR_OK){
    echo '檔案名稱: ' . $_FILES['product_picture']['name'] . '<br/>';
    echo '檔案類型: ' . $_FILES['product_picture']['type'] . '<br/>';
    echo '檔案大小: ' . ($_FILES['product_picture']['size'] / 1024) . ' KB<br/>';
    echo '暫存名稱: ' . $_FILES['product_picture']['tmp_name'] . '<br/>';
  
    # 檢查檔案是否已經存在
    if (file_exists('D://xampp/htdocs/HW/product_pic/' . $_FILES['product_picture']['name'])){
    //   echo '檔案已存在。<br/>';
    } else {
      $file = $_FILES['product_picture']['tmp_name'];
      $dest = 'D://xampp/htdocs/HW/product_pic/' . $_FILES['product_picture']['name'];
  
      # 將檔案移至指定位置
      move_uploaded_file($file, $dest);
    }
    echo $_FILES['product_picture']['name'];
  } else {
    echo '錯誤代碼：' . $_FILES['product_picture']['error'] . '<br/>';
  }
?>