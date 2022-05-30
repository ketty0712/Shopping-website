<?php
session_start();
if (!isset($_SESSION['tmp_num'])) {
    $_SESSION['tmp_num'] = array();
}
if (!isset($_SESSION['cart_id'])) {
    $_SESSION['cart_id'] = array();
}
// if(isset($_SESSION['cart']))
//     $arr_cart = array_filter(explode(",",$_SESSION['cart']));//將購物車Cookie轉成陣列,並移除空值
if(!isset($_SESSION['total'])){
    $_SESSION['total']=0;
}
$num=$_POST['num'];
$id=$_POST['id'];

if(isset($id)&&!in_array($id, $_SESSION['cart_id'])&&$num!=0){   //不在車裡的商品
    echo "<h1>".$id."</h1>";
    $_SESSION['tmp_num'][]=$num;
    $_SESSION['cart_id'][]=$id;
    $_SESSION['total']=0;
    for($i=0;$i<count($_SESSION['cart_id']);$i++){      //更新總數量
        $_SESSION['total']+=$_SESSION['tmp_num'][$i];
    }
    $re['card_id'][]=$_SESSION['cart_id'];
    $re['total'][]=$_SESSION['total'];
}
else if(in_array($id, $_SESSION['cart_id'])){           //在車裡的商品
    $_SESSION['tmp_num'][array_search($id, $_SESSION['cart_id'])]=$num; //更新商品數量
    if($num==0){    //若按的是"X"，商品數量=0
        // echo "刪除了".$id;
        unset($_SESSION['tmp_num'][array_search($id,$_SESSION['cart_id'])]);    //移除該商品在購物車數量
        // unset($arr_cart[array_search($id,$_SESSION['cart_id'])]);               //移除該商品在購物車標記
        unset($_SESSION['cart_id'][array_search($id,$_SESSION['cart_id'])]);    //移除該商品在購物車內id
        $_SESSION['tmp_num']=array_values($_SESSION['tmp_num']);        //重新排序
        // $arr_cart=array_values($arr_cart);                                  
        // $_SESSION['cart']=implode(",",$arr_cart);
        $_SESSION['cart_id']=array_values($_SESSION['cart_id']);        //重新排序
    }
    
    $_SESSION['total']=0;
    for($i=0;$i<count($_SESSION['cart_id']);$i++){      //更新總數量
        $_SESSION['total']+=$_SESSION['tmp_num'][$i];
    }
    $re['total'][]=$_SESSION['total'];
    $re['card_id'][]=$_SESSION['cart_id'];
}
echo json_encode($re);
// for($i=0;$i<count($_SESSION['cart_id']);$i++)           //只是想看一下Session的東西有啥麼
// {
//     echo "id>".$_SESSION['cart_id'][$i]."　";
//     echo "num>".$_SESSION['tmp_num'][$i]."<br>";
// }
session_write_close();
?>