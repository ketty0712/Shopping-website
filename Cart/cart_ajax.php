<?php
session_start();
if(isset($_SESSION['cart_id']))
    $cart = $_SESSION['cart_id'];
else
    $cart=array();
if (!isset($_SESSION['tmp_num'])) {
    $_SESSION['tmp_num'] = array();
}
if (!isset($_SESSION['cart_id'])) {
    $_SESSION['cart_id'] = array();
}
if(!isset($_SESSION['total'])){
    $_SESSION['total']=0;
}
$oper = $_POST['oper'];
$id = $_POST['id'];
$quent=$_POST['add'];

$arr_cart = $cart;
// $arr_cart = array_filter(explode(",",$cart));//將購物車Cookie轉成陣列,並移除空值
if ($oper==1)//加入購物車
{
    if (!in_array($id,$arr_cart)){
        $arr_cart[]=$id;//加入陣列
        $_SESSION['cart_id'][]=$id;
        $_SESSION['tmp_num'][]=$quent;
        // $_SESSION['total']+=$quent;
    }
    else{
        $_SESSION['tmp_num'][array_search($id,$_SESSION['cart_id'])]+=$quent;
    }
    $_SESSION['total']=0;
    for($i=0;$i<count($_SESSION['cart_id']);$i++){
        $_SESSION['total']+=$_SESSION['tmp_num'][$i];
    }
}
// if ($oper==2)//取消購物車
// {
//     unset($arr_cart[array_search($id,$arr_cart)]);//搜尋陣列元素並移除該元素
//     $arr_cart=array_values($arr_cart);//重新排列陣列順序
//     $_SESSION['total']-=$_SESSION['tmp_num'][array_search($id,$_SESSION['cart_id'])];
//     unset($_SESSION['tmp_num'][array_search($id,$_SESSION['cart_id'])]);
//     unset($_SESSION['cart_id'][array_search($id,$_SESSION['cart_id'])]);
//     $_SESSION['tmp_num']=array_values($_SESSION['tmp_num']);
//     $_SESSION['cart_id']=array_values($_SESSION['cart_id']);
//     if($_SESSION['total']<=0){
//         unset($_SESSION['total']);
//     }
// }
// $cart = implode(",",$arr_cart); //將所有商品以逗號連結成一字串
// $_SESSION['cart']=$cart;//寫入SESSION

// $all_num = implode(",",$_SESSION['tmp_num']);
//傳回JSON格式資料
echo json_encode($_SESSION['tmp_num']);
// echo $_SESSION['cart'];
session_write_close();
?>