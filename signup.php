<?php

session_start();

include("config.php");

$message = "";

if(isset($_POST['signup']))
{
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if($fullname == "" || $username == "" || $email == "" || $password == "" || $confirmpassword == "")
    {
        $message = "Fill all fields";
    }
    else if($password != $confirmpassword)
    {
        $message = "Passwords do not match";
    }
    else if($_FILES['photo']['name'] == "")
    {
        $message = "Select a profile photo";
    }
    else
    {
        $checkuser = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");

        if(mysqli_num_rows($checkuser) > 0)
        {
            $message = "Username already exists";
        }
        else
        {
            $checkemail = mysqli_query($conn, "SELECT * FROM login WHERE email='$email'");

            if(mysqli_num_rows($checkemail) > 0)
            {
                $message = "Email already exists";
            }
            else
            {
                $filename = $_FILES['photo']['name'];
                $tempname = $_FILES['photo']['tmp_name'];
                $newfilename = time() . "_" . $filename;

                move_uploaded_file($tempname, "uploads/" . $newfilename);

                $sql = "INSERT INTO login (username, password, fullname, email, photo)
                        VALUES ('$username', '$password', '$fullname', '$email', '$newfilename')";

                if(mysqli_query($conn, $sql))
                {
                    header("Location: login.php");
                    exit();
                }
                else
                {
                    $message = "Signup Failed";
                }
            }
        }
    }
}

?>

<!DOCTYPE html>

<html>
<head>
<title>Signup</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

<iframe src="index.php" class="auth-bg-iframe" scrolling="no" tabindex="-1" aria-hidden="true"></iframe>

<div class="auth-card">
<h2>Create Your La Toscana Account</h2>
<form method="post" enctype="multipart/form-data">

<label>Full Name</label><br> <input type="text" name="fullname">

<br><br>

<label>Username</label><br> <input type="text" name="username">

<br><br>

<label>Email</label><br> <input type="email" name="email">

<br><br>

<label>Password</label><br> <input type="password" name="password">

<br><br>

<label>Confirm Password</label><br> <input type="password" name="confirmpassword">

<br><br>

<label>Profile Photo</label><br> <input type="file" name="photo">

<br><br>

<input type="submit" name="signup" value="Sign Up">

<br><br>

<span style="color:red;">
<?php echo $message; ?>
</span>

<br><br>

<a href="login.php">Already have an account?</a>

</form>

</div>

</body>
</html>
