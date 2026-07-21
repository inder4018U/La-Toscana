<?php

session_start();

if(isset($_POST['dishid']))
{
    $id = $_POST['dishid'];
    $dishname = $_POST['dishname'];
    $dishcuisine = $_POST['dishcuisine'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    if(isset($_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]['qty'] += $qty;
    }
    else
    {
        $_SESSION['cart'][$id] = array(
            "dishname" => $dishname,
            "dishcuisine" => $dishcuisine,
            "price" => $price,
            "qty" => $qty
        );
    }
}

header("Location: cart.php");
exit();

?>
