<?php

include("config.php");

$category = $_POST['category'];
$search = $_POST['search'];

$sql = "SELECT *
        FROM dishes, categories
        WHERE dishes.dishcuisine=categories.cuisineid";

if($category != "")
{
    $sql .= " AND dishes.dishcuisine='$category'";
}

if($search != "")
{
    $sql .= " AND dishes.dishname LIKE '%$search%'";
}

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
?>

<div class="menu-grid">

<?php

while($row=mysqli_fetch_assoc($result))
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
<div class="dish-card-img dish-no-img">
No Image
</div>
<?php
}
?>

<h3><?php echo $row['dishname']; ?></h3>

<p class="dish-cuisine">
<?php echo $row['cuisinename']; ?>
</p>

<p class="dish-price">
&#8377;<?php echo $row['price']; ?>
</p>

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

<?php
}
else
{
?>

<h2 style="text-align:center;">
No Dishes Found
</h2>

<p style="text-align:center;">
Try another category or search term.
</p>

<?php
}
?>