<?php

session_start();

if(!isset($_SESSION['adminid']))
{
    header("Location: index.php");
    exit();
}

include("../config.php");

$id = $_GET['id'];

$check = "SELECT * FROM dishes
          WHERE dishcuisine='$id'";

$result = mysqli_query($conn, $check);

if(mysqli_num_rows($result) > 0)
{
    echo "Cannot Delete. Cuisine is being used by one or more dishes.";

    echo "<br><br>";

    echo "<a href='adminpanel.php'>Back</a>";
}
else
{
    $sql = "DELETE FROM categories
            WHERE cuisineid='$id'";

    mysqli_query($conn, $sql);

    header("Location: adminpanel.php");
}

?>
