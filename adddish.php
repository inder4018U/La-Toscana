<?php

include("config.php");

$message="";

if(isset($_POST['submit']))
{
    $dishname=$_POST['dishname'];
    $dishcuisine=$_POST['dishcuisine'];

    if($dishname=="")
    {
        $message="Enter Dish Name";
    }
    else
    {
        $sql="INSERT INTO dishes(dishname,dishcuisine)
              VALUES('$dishname','$dishcuisine')";

        if(mysqli_query($conn,$sql))
        {
            $message="Dish Added Successfully";
        }
        else
        {
            $message="Error Adding Dish";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Dish</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add Dish</h2>

<form method="post">

Dish Name<br>
<input type="text" name="dishname">

<br><br>

Cuisine<br>

<select name="dishcuisine">

<?php

$sql="SELECT * FROM categories";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
?>

<option value="<?php echo $row['cuisineid']; ?>">
    <?php echo $row['cuisinename']; ?>
</option>

<?php
}
?>

</select>

<br><br>

<input type="submit" name="submit" value="Add Dish">

</form>

<br>

<?php echo $message; ?>

<br><br>

<a href="adminpanel.php">Back to Admin Panel</a>

</div>

</body>
</html>