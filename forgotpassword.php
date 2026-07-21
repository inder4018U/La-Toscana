<?php

include("config.php");

$message = "";

if(isset($_POST['reset']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if($username == "" || $email == "" || $newpassword == "" || $confirmpassword == "")
    {
        $message = "Fill all fields";
    }
    else if($newpassword != $confirmpassword)
    {
        $message = "Passwords do not match";
    }
    else
    {
        $check = mysqli_query($conn, "SELECT * FROM login WHERE username='$username' AND email='$email'");

        if(mysqli_num_rows($check) == 0)
        {
            $message = "Invalid Username or Email";
        }
        else
        {
            $sql = "UPDATE login SET password='$newpassword' WHERE username='$username' AND email='$email'";

            if(mysqli_query($conn, $sql))
            {
                $message = "Password Updated Successfully";
            }
            else
            {
                $message = "Update Failed";
            }
        }
    }
}

?>

<!DOCTYPE html>

<html>
<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

<iframe src="index.php" class="auth-bg-iframe" scrolling="no" tabindex="-1" aria-hidden="true"></iframe>

<div class="auth-card">
<h2>Recover Account</h2>
<form method="post">

<label>Username</label><br> <input type="text" name="username">

<br><br>

<label>Email</label><br> <input type="email" name="email">

<br><br>

<label>New Password</label><br> <input type="password" name="newpassword">

<br><br>

<label>Confirm Password</label><br> <input type="password" name="confirmpassword">

<br><br>

<input type="submit" name="reset" value="Update Password">

<br><br>

<span style="color:red;">
<?php echo $message; ?>
</span>

<br><br>

<a href="login.php">Back to Login</a>

</form>

</div>

</body>
</html>
