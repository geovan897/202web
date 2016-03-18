<?php

require_once("clientDB.php.inc");

$request = $_POST['request'];
$response = "FUCK<p>";

switch($request)
{
    case "login":
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = new clientDB("connect.ini");
	$response = $login->validateClient($username,$password);
	if ($response['success']===true)
	{	
	     header('Location:welcome.php');
	     session_start();
	     $_SESSION['username'] = $username;
	}
	else
	{
		$response = "Login Failed:".$response['message']."<p>";
	}
	break;
     case "register":
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = new clientDB("connect.ini");
	$response = $login->addNewClient($username,$password);
	
	if ($response['success']===true)
	{
		$response = "Congrats You're Registered!<p>";
		?> <p align="center"><a href ="index.html" target ="_blank"/><b> Login Here</b></a> </p>
		<?php
	
	}
	else
	{
		$response = "Sorry there was a problem: ".$response['message']."<p>";
	}
	break;
    
}


echo $response;
?>
