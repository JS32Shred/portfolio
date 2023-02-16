<?php

session_start();

$item = $_POST["itemtoremove"];
$cart = $_SESSION["cart"];

if(($key = array_search($item, $cart)) !== false){
    unset($cart[$key]);
    $_SESSION["cart"] = $cart;

    if(empty($cart)){
        unset($_SESSION["cart"]);
    }

    header("Location: cartview.php");
    exit;
}

?>