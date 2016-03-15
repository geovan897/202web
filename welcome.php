<?php


session_start(); // original portion before changes 

echo 'Welcome '.$_SESSION['username']; // this is the original portion before changes

$user = $_SESSION['username'];

echo '<a href ="logout.php" target ="_blank"/><b> Logout</b></a>';


?>








