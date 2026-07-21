<?php

session_start();

include("config.php");

$message = "";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password == "")
    {
        $message = "Fill all fields";
    }
    else
    {
        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['userid'] = $row['userid'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['photo'] = $row['photo'];

            header("Location: index.php");
            exit();
        }
        else
        {
            $message = "Invalid Username or Password";
        }
    }
}

?>

<!DOCTYPE html>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

<iframe src="index.php" class="auth-bg-iframe" scrolling="no" tabindex="-1" aria-hidden="true"></iframe>

<div class="auth-card">
<h2>La Toscana Login</h2>
<form method="post">

<label>Username</label><br> <input type="text" name="username">

<br><br>

<label>Password</label><br> <input type="password" name="password">

<br><br>

<input type="submit" name="login" value="Login">

<br><br>

<span style="color:red;">
<?php echo $message; ?>
</span>

<br><br>

<a href="signup.php">Create Account</a>

|

<a href="forgotpassword.php">Forgot Password?</a>

</form>

</div>

</body>
</html>
