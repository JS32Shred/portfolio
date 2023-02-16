<?php

session_start();

if(isset($_POST["addwatch"])){
    $product = array($_POST["addwatch"]);

    if(isset($_SESSION["cart"])){
        $cart = $_SESSION["cart"];
        $_SESSION["cart"] = array_merge($cart, $product);
    }

    else{
        $_SESSION["cart"] = $product;
    }

    header("Location: cartview.php");
    exit;
}

else{
    header("Location: index.php");
    exit;
}

?>