<?php

include("config.php");

$id=$_GET['id'];

$sql="SELECT * FROM dishes WHERE dishid='$id'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $dishname=$_POST['dishname'];
    $dishcuisine=$_POST['dishcuisine'];

    $sql="UPDATE dishes
          SET dishname='$dishname',
              dishcuisine='$dishcuisine'
          WHERE dishid='$id'";

    mysqli_query($conn,$sql);

    header("Location: adminpanel.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Update Dish</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Update Dish</h2>

<form method="post">

Dish Name<br>

<input
type="text"
name="dishname"
value="<?php echo $row['dishname']; ?>">

<br><br>

Cuisine<br>

<select name="dishcuisine">

<?php

$sql2="SELECT * FROM categories";
$result2=mysqli_query($conn,$sql2);

while($row2=mysqli_fetch_assoc($result2))
{
?>

<option
value="<?php echo $row2['cuisineid']; ?>"

<?php
if($row['dishcuisine']==$row2['cuisineid'])
{
    echo "selected";
}
?>

>

<?php echo $row2['cuisinename']; ?>

</option>

<?php
}
?>

</select>

<br><br>

<input type="submit" name="update" value="Update Dish">

</form>

<br>

<a href="adminpanel.php">Back</a>

</div>

</body>
</html>