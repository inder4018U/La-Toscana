<?php

$conn = mysqli_connect("localhost", "root", "", "italian");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
