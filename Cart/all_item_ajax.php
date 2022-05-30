<?php
session_start();

if(isset($_SESSION['products']['price'])){
    $price_array = $_SESSION['products']['price'];
    echo json_encode($price_array);
}
