<?php

session_start();

$message = "";

if(isset($_GET['msg']))
{
    $message = $_GET['msg'];
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Your Cart | La Toscana</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header id="home">
<div class="top-buttons">

<?php
if(isset($_SESSION['userid']))
{
?>
<div class="nav-user">

<?php
if(isset($_SESSION['photo']) && $_SESSION['photo'] != "")
{
?>
<img src="uploads/<?php echo $_SESSION['photo']; ?>" class="profile-photo">
<?php
}
?>

<span>Welcome <?php echo $_SESSION['fullname']; ?></span>

</div>

<a href="logout.php">Logout</a>

<?php
}
else
{
?>
<a href="login.php">Login</a>
<a href="signup.php">Sign Up</a>
<?php
}
?>

</div>

<h1>La Toscana</h1>
<p><i>Your Cart</i></p>

</header>

<div class="main-nav">
<a href="index.php#home">Home</a>
<a href="index.php#about">About Us</a>
<a href="menu.php">Menu</a>
<a href="cart.php">Cart</a>
<a href="index.php#contact">Contact</a>
</div>

<div class="admin-container">

<h2>Shopping Cart</h2>

<?php
if($message != "")
{
?>
<p style="color:green; text-align:center;"><?php echo $message; ?></p>
<?php
}
?>

<table>

<tr>
<th>Dish</th>
<th>Cuisine</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th>Remove</th>
</tr>

<?php

$grand = 0;

if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $id => $item)
    {
        $total = $item['price'] * $item['qty'];
        $grand += $total;
?>

<tr>

<td><?php echo $item['dishname']; ?></td>

<td><?php echo $item['dishcuisine']; ?></td>

<td>&#8377;<?php echo $item['price']; ?></td>

<td><?php echo $item['qty']; ?></td>

<td>&#8377;<?php echo $total; ?></td>

<td>
<a class="action-btn" href="removefromcart.php?id=<?php echo $id; ?>">Remove</a>
</td>

</tr>

<?php
    }
}
?>

<tr>
<td colspan="4"><b>Grand Total</b></td>
<td colspan="2"><b>&#8377;<?php echo $grand; ?></b></td>
</tr>

</table>

<br>

<a href="menu.php">Continue Shopping</a>

<?php
if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
{
?>
<br><br>
<form method="post" action="placeorder.php">
<input type="submit" value="Place Order">
</form>
<?php
}
?>

</div>

</body>
</html>
