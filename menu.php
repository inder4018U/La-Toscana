<?php

session_start();

include("config.php");

$sql = "SELECT *
        FROM dishes, categories
        WHERE dishes.dishcuisine=categories.cuisineid";

$result = mysqli_query($conn, $sql);

$categoryquery = mysqli_query($conn,"SELECT * FROM categories");

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Our Menu | La Toscana</title>

<link rel="stylesheet" href="style.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

function loaddata()
{
    var category=$("#category").val();
    var search=$("#search").val();

    $.ajax({

        type:"POST",

        url:"filtermenu.php",

        data:{
            category:category,
            search:search
        },

        success:function(data)
        {
            $("#displaydata").html(data);
        }

    });

}

$(document).ready(function(){

    $("#category").change(function(){

        loaddata();

    });

    $("#search").keyup(function(){

        loaddata();

    });

});

</script>

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

<p><i>Our Menu</i></p>

</header>

<div class="main-nav">

<a href="index.php#home">Home</a>

<a href="index.php#about">About Us</a>

<a href="menu.php">Menu</a>

<a href="cart.php">Cart</a>

<a href="index.php#contact">Contact</a>

</div>

<div class="admin-container">

<h2>Our Dishes</h2>

<div class="menu-filter">

<input type="text" id="search" placeholder="🔍 Search your favourite dish...">

<select id="category">

<option value="">All Categories</option>

<?php

while($cat=mysqli_fetch_assoc($categoryquery))
{
?>

<option value="<?php echo $cat['cuisineid']; ?>">
<?php echo $cat['cuisinename']; ?>
</option>

<?php
}
?>

</select>

</div>

<br>	

<div id="displaydata">

<div class="menu-grid">

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="dish-card">

<?php
if($row['image'] != "")
{
?>

<img src="dishimages/<?php echo $row['image']; ?>" class="dish-card-img">

<?php
}
else
{
?>

<div class="dish-card-img dish-no-img">No Image</div>

<?php
}
?>

<h3><?php echo $row['dishname']; ?></h3>

<p class="dish-cuisine"><?php echo $row['cuisinename']; ?></p>

<p class="dish-price">&#8377;<?php echo $row['price']; ?></p>

<form action="addcart.php" method="post">

<input type="hidden" name="dishid" value="<?php echo $row['dishid']; ?>">

<input type="hidden" name="dishname" value="<?php echo $row['dishname']; ?>">

<input type="hidden" name="dishcuisine" value="<?php echo $row['cuisinename']; ?>">

<input type="hidden" name="price" value="<?php echo $row['price']; ?>">

<input type="number" name="qty" value="1" min="1" class="dish-qty">

<input type="submit" value="Add to Cart">

</form>

</div>

<?php
}
?>

</div>

</div>

<br>

<a href="cart.php">View Cart</a>

</div>

<footer id="contact">

<p>

La Toscana Restaurant<br>

Sector 35, Chandigarh<br>

Phone: +91 98765 43210<br>

Email: info@latoscana.com

</p>

</footer>

</body>
</html>