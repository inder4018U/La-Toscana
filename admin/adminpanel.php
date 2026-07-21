<?php

session_start();

if(!isset($_SESSION['adminid']))
{
    header("Location: index.php");
    exit();
}

include("../config.php");

$cuisinequery = "SELECT * FROM categories";
$cuisineresult = mysqli_query($conn, $cuisinequery);

$dishquery = "SELECT *
              FROM dishes, categories
              WHERE dishes.dishcuisine=categories.cuisineid";

$dishresult = mysqli_query($conn, $dishquery);

$orderquery = "SELECT * FROM orders ORDER BY orderid DESC";
$orderresult = mysqli_query($conn, $orderquery);

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="../style.css">
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

while($row = mysqli_fetch_assoc($cuisineresult))
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
    <th>Image</th>
    <th>Dish Name</th>
    <th>Cuisine ID</th>
    <th>Cuisine Name</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($dishresult))
{
?>

<tr>

    <td><?php echo $row['dishid']; ?></td>

    <td>
    <?php
    if($row['image'] != "")
    {
    ?>
        <img src="../dishimages/<?php echo $row['image']; ?>" width="60">
    <?php
    }
    else
    {
        echo "No Image";
    }
    ?>
    </td>

    <td><?php echo $row['dishname']; ?></td>

    <td><?php echo $row['cuisineid']; ?></td>

    <td><?php echo $row['cuisinename']; ?></td>

    <td>&#8377;<?php echo $row['price']; ?></td>

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

<br><br>

<h2>Orders</h2>

<table>

<tr>
    <th>Order ID</th>
    <th>Username</th>
    <th>Dish Name</th>
    <th>Cuisine</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($orderresult))
{
?>

<tr>

    <td><?php echo $row['orderid']; ?></td>

    <td><?php echo $row['username']; ?></td>

    <td><?php echo $row['dishname']; ?></td>

    <td><?php echo $row['dishcuisine']; ?></td>

    <td><?php echo $row['quantity']; ?></td>

    <td>&#8377;<?php echo $row['price']; ?></td>

    <td>&#8377;<?php echo $row['total']; ?></td>

    <td><?php echo $row['status']; ?></td>

    <td>

        <form method="post" action="updateorderstatus.php">

            <input type="hidden" name="orderid" value="<?php echo $row['orderid']; ?>">

            <select name="status">
                <option value="Pending" <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>
                <option value="Preparing" <?php if($row['status']=="Preparing") echo "selected"; ?>>Preparing</option>
                <option value="Delivered" <?php if($row['status']=="Delivered") echo "selected"; ?>>Delivered</option>
                <option value="Cancelled" <?php if($row['status']=="Cancelled") echo "selected"; ?>>Cancelled</option>
            </select>

            <input type="submit" value="Update">

        </form>

    </td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>
