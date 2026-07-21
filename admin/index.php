<?php

session_start();

include("../config.php");

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
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['adminid'] = $row['adminid'];
            $_SESSION['adminname'] = $row['fullname'];

            setcookie("adminid", $row['adminid'], time()+3600, "/");
            setcookie("adminname", $row['fullname'], time()+3600, "/");

            header("Location: adminpanel.php");
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
<title>Admin Login</title>
<link rel="stylesheet" href="../style.css">
</head>
<body class="auth-page">

<iframe src="../index.php" class="auth-bg-iframe" scrolling="no" tabindex="-1" aria-hidden="true"></iframe>

<div class="auth-card">
<h2>Admin Login</h2>
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

</form>
</div>

</body>
</html>
