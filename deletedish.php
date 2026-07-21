<?php

include("config.php");

$id=$_GET['id'];

$sql="DELETE FROM dishes
      WHERE dishid='$id'";

mysqli_query($conn,$sql);

header("Location: adminpanel.php");

?>