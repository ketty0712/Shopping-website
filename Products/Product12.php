<?php
session_start();
$price = array(1 => "1,680", "1,580", "1,380", "1,680", "1,680", "2,150", "220", "250", "650", "1,880", "2,980", "1,580");
$p_name = array(
  1 => "【客製化蛋糕】酒鬼系列蛋糕-絕對伏特加", "【客製化蛋糕】酒鬼系列蛋糕-jack daniel", "【客製化蛋糕】藍色海洋風格蛋糕",
  "【客製化蛋糕】男人系冷色調風格蛋糕", "【客製化蛋糕】男人系灰色風格蛋糕", "【客製化蛋糕】人魚公主蛋糕", "【旅行蛋糕】紅酒莓果蛋糕", "【經典系列】乳酪布朗尼", "10入草莓系列達克瓦茲禮盒", "【客製化蛋糕】酒鬼系列蛋糕-格瑪蘭", "【客製化蛋糕】權力遊戲卓耿蛋糕", "【客製化蛋糕】迷霧金磚"
);
$_GET['product_no'] = 12;
// $product_name = $p_name[$product_no];
// $product_price = $price[$product_no];
// $left_quantity = 15;
// $short_description = " 六吋迷霧金磚－是一款以奶油霜為基底的客製化蛋糕，壽星是男生喜歡金磚，所以我們以灰藍色調為基底，搭配上了金色的點綴，顯現出沈穩內念的男人風。
// 蛋糕體本身，我們運用了巧克力蛋糕，搭配上了甘納許和手工熬製的莓果果醬。";
// $description = "【客製化蛋糕】迷霧金磚<br>是一款以奶油霜為基底的客製化蛋糕，壽星是男生喜歡金磚，所以我們以灰藍色調為基底，搭配上了金色的點綴，顯現出沈穩內念的男人風。<br>蛋糕體本身，我們運用了巧克力蛋糕，搭配上了甘納許和手工熬製的莓果果醬。<br><br>為了確保宅配的完整度，以及造型上的發揮，我們的所有蛋糕皆為蛋白奶油霜蛋糕而非鮮奶油蛋糕。<br>為了降低蛋糕的甜度，我們奶油霜採低糖做法，吃起來帶淡淡的奶香。<br>請在收到蛋糕後冷藏退冰至少8小時以上，或室溫退冰兩小時以上口感較佳。<br><br>為響應環保，蛋糕不另附一次性的餐盤，刀子，請訂購時需注意唷！<br><br>客製化蛋糕訂購流程<br>1.先聯絡設計師，討論想要的尺寸，大小，風格！可以提供相關參考圖片，我們會依據內容做設計，但因為我們不抄襲其他設計者的作品，所以無法100％一樣。訂購前請考慮。請務必先討論再下訂！！！！架上蛋糕也可以直接訂購。<br>2.協定好內容，價格後我們會上架商品，再麻煩下訂付款！<br>3.下訂付款後約7-14個工作天出貨，依據每期訂單數量，以及訂單複雜度會有所改變，急需蛋糕者請勿訂購！<br><br>【主要成分】麵粉，蛋，糖，牛奶，奶油<br>【保存方式與期限】冷藏保存3天，建議趁早食用完畢！<br>【尺寸】6吋蛋糕<br>【包裝方式】以翻糖包裝盒包裝！<br><br>運送宅配注意事項！！！！！<br>經過討論設計的蛋糕，會以宅配為主要設計方向，也會針對宅配做出適合妥善的包裝方式，但是在宅配過程中不能保證完全沒有損傷，所以在下訂前請先考慮再三！有重大損傷者，請在收到貨品後錄影回傳告知，我們將理賠損失，但最高賠償上限為新台幣1000元整";
  include "Product_template.php";

?>