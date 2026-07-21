<?php

session_start();

// Login is only required at the point of placing the order
if(!isset($_SESSION['userid']))
{
    header("Location: login.php");
    exit();
}

include("config.php");

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
{
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];

    foreach($_SESSION['cart'] as $id => $item)
    {
        $dishname = $item['dishname'];
        $dishcuisine = $item['dishcuisine'];
        $price = $item['price'];
        $qty = $item['qty'];
        $total = $price * $qty;

        $sql = "INSERT INTO orders(userid, username, dishid, dishname, dishcuisine, price, quantity, total, status)
                VALUES('$userid', '$username', '$id', '$dishname', '$dishcuisine', '$price', '$qty', '$total', 'Pending')";

        mysqli_query($conn, $sql);
    }

    // Empty the cart after placing the order
    unset($_SESSION['cart']);
}

header("Location: cart.php?msg=Order Placed Successfully");
exit();

?>
