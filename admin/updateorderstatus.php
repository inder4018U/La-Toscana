<?php

session_start();

if(!isset($_SESSION['adminid']))
{
    header("Location: index.php");
    exit();
}

include("../config.php");

if(isset($_POST['orderid']))
{
    $orderid = $_POST['orderid'];
    $status = $_POST['status'];

    $sql = "UPDATE orders SET status='$status' WHERE orderid='$orderid'";

    mysqli_query($conn, $sql);
}

header("Location: adminpanel.php");
exit();

?>
