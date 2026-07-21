<?php

session_start();

session_unset();

session_destroy();

setcookie("adminid", "", time()-3600, "/");
setcookie("adminname", "", time()-3600, "/");

header("Location: index.php");

exit();

?>
