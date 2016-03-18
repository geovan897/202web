<?php
session_start(); 

if ( isset( $_SESSION['username'] ) ){
  
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
  $user = $_SESSION['username'];
  $response2 = $login->bookMarks($user);

 }
 
 /// below the php is prototype material
?>

<!DOCTYPE html>
<html>
<head>
<style>
ul {
   list-style-type: none;
    position:absolute;
    top:0px;
    left:0px;
    margin: 0px;
    padding: 0px;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
    background-color: #555;
    color: white;
}
</style>
</head>
<body>

<h2></h2>

<ul>
 
  <li><a href="welcome.php">My Profile</a></li>
  <li><a href="logout.php">Log Out</a></li>
</ul>

</body>
</html>