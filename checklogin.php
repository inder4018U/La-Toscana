<?php

include("config.php");

$username=$_POST['username'];
$password=$_POST['password'];
$usertype=$_POST['usertype'];

if($usertype=="admin")
{
    $sql="SELECT * FROM admin
          WHERE username='$username'
          AND password='$password'";
}
else
{
    $sql="SELECT * FROM login
          WHERE username='$username'
          AND password='$password'";
}

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
    if($usertype=="admin")
    {
        header("Location: adminpanel.php");
    }
    else
    {
        echo "User Login Successful";
    }
}
else
{
    echo "Invalid Username or Password";
}

?>