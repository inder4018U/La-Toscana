<?php

session_start();

if(!isset($_SESSION['adminid']))
{
    header("Location: index.php");
    exit();
}

include("../config.php");

$id = $_GET['id'];

$sql = "SELECT * FROM categories WHERE cuisineid='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $cuisinename = $_POST['cuisinename'];

    $sql = "UPDATE categories
            SET cuisinename='$cuisinename'
            WHERE cuisineid='$id'";

    mysqli_query($conn, $sql);

    header("Location: adminpanel.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Cuisine</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">

<h2>Update Cuisine</h2>

<form method="post">

Cuisine Name<br>

<input
type="text"
name="cuisinename"
value="<?php echo $row['cuisinename']; ?>">

<br><br>

<input type="submit" name="update" value="Update Cuisine">

</form>

<br>

<a href="adminpanel.php">Back</a>

</div>

</body>
</html>
