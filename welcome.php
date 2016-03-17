<?php
session_start(); //oirginal portion before changes



//echo ' Welcome '.$_SESSION['username']; // this is the original portion before changes </p>";

//$user = $_SESSION['username'];



 if ( isset( $_SESSION['username'] ) ){
  $x =  "<p class='welcome'>Welcome, <a class='removealine' href='logout.php' title=''>".$_SESSION['username']."</a></p>";
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
  //$response = $login->teams(); this portion and the code below works fine but we need to make a nav bar for the list of teams in a league
 //$response2 = $login->leagues();

 }
 //echo '<a href ="logout.php" target ="_blank"/><b> Logout</b></a>';

 
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

<h2><?php echo "Welcome  ".$_SESSION['username'];?></h2>

<ul>
  <li><a href="userteams.php"> My Teams </a><li>
  <li><a href="Champsleague.php">Champions League Info</a></li>
  <li><a href="logout.php">Log Out</a></li>
</ul>

</body>
</html>