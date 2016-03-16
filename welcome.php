<?php
session_start(); //oirginal portion before changes



echo 'Welcome '.$_SESSION['username']; // this is the original portion before changes

$user = $_SESSION['username'];

echo '<a href ="logout.php" target ="_blank"/><b> Logout</b></a>';

 if ( isset( $_SESSION['username'] ) ){
  $x =  "<p class='welcome'>Welcome, <a class='removealine' href='account.php' title=''>".$_SESSION['username']."</a></p>";
  
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
  $response = $login->teams();

 }
?>








