<?php

session_start();

if(!isset($_SESSION['adminid']))
{
    header("Location: login.php");
    exit();
}

include("config.php");

$cuisinequery="SELECT * FROM categories";
$cuisineresult=mysqli_query($conn,$cuisinequery);

$dishquery="SELECT *
            FROM dishes, categories
            WHERE dishes.dishcuisine=categories.cuisineid";

$dishresult=mysqli_query($conn,$dishquery);

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="admin-container">

<h1>Welcome <?php echo $_SESSION['adminname']; ?></h1>

<div class="admin-menu">

<a href="addcuisine.php">Add Cuisine</a>

<a href="adddish.php">Add Dish</a>

<a href="logout.php">Logout</a>

</div>

<br>

<h2>Cuisine Management</h2>

<table>

<tr>
    <th>Cuisine ID</th>
    <th>Cuisine Name</th>
    <th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($cuisineresult))
{
?>

<tr>

    <td><?php echo $row['cuisineid']; ?></td>

    <td><?php echo $row['cuisinename']; ?></td>

    <td>

        <a class="action-btn"
        href="updatecuisine.php?id=<?php echo $row['cuisineid']; ?>">
        Update
        </a>

        <a class="action-btn"
        href="deletecuisine.php?id=<?php echo $row['cuisineid']; ?>"
        onclick="return confirm('Delete this cuisine?')">
        Delete
        </a>

    </td>

</tr>

<?php
}
?>

</table>

<br><br>

<h2>Dish Management</h2>

<table>

<tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Cuisine ID</th>
    <th>Cuisine Name</th>
    <th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($dishresult))
{
?>

<tr>

    <td><?php echo $row['dishid']; ?></td>

    <td><?php echo $row['dishname']; ?></td>

    <td><?php echo $row['cuisineid']; ?></td>

    <td><?php echo $row['cuisinename']; ?></td>

    <td>

        <a class="action-btn"
        href="updatedish.php?id=<?php echo $row['dishid']; ?>">
        Update
        </a>

        <a class="action-btn"
        href="deletedish.php?id=<?php echo $row['dishid']; ?>"
        onclick="return confirm('Delete this dish?')">
        Delete
        </a>

    </td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>