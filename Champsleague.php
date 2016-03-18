<?php
session_start(); 

if ( isset( $_SESSION['username'] ) ){
  
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
  $response = $login->teams(); //this portion and the code below works fine but we need to make a nav bar for the list of teams in a league
 //$response2 = $login->leagues();

 }
 
 /// below the php is prototype material
?>

<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
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