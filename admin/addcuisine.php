<?php

session_start();

if(!isset($_SESSION['adminid']))
{
    header("Location: index.php");
    exit();
}

include("../config.php");

$message = "";

if(isset($_POST['submit']))
{
    $cuisinename = $_POST['cuisinename'];

    if($cuisinename == "")
    {
        $message = "Enter Cuisine Name";
    }
    else
    {
        $check = mysqli_query($conn, "SELECT * FROM categories WHERE cuisinename='$cuisinename'");

        if(mysqli_num_rows($check) > 0)
        {
            $message = "Cuisine Already Exists";
        }
        else
        {
            $sql = "INSERT INTO categories(cuisinename) VALUES('$cuisinename')";

            if(mysqli_query($conn, $sql))
            {
                $message = "Cuisine Added Successfully";
            }
            else
            {
                $message = "Error Adding Cuisine";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Cuisine</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">

<h2>Add Cuisine</h2>

<form method="post">

Cuisine Name<br>
<input type="text" name="cuisinename">

<br><br>

<input type="submit" name="submit" value="Add Cuisine">

</form>

<br>

<span style="color:green;">
<?php echo $message; ?>
</span>

<br><br>

<a href="adminpanel.php">Back to Admin Panel</a>

</div>

</body>
</html>
