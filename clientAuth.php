#!/usr/bin/php
<?php
require_once("clientDB.php.inc");

$command = $argv[1];


switch($command)
{
    case 'register':
	$name = $argv[2];
	$password = $argv[3];
	$db = new clientDB("connect.ini");
	$db->addNewClient($name,$password);
	break;
    case 'login':
	$name = $argv[2];
	$password = $argv[3];
	$db = new clientDB("connect.ini");
	if ($db->validateClient($name,$password) == 0)
	{
		echo "invalid login!".PHP_EOL;
	}
	else
	{
		echo "login successful!!".PHP_EOL;
	}
	break;
    default:
	echo "usage:\n".$argv[0]." [register|login] <username> <password>".PHP_EOL;
	break;
}


?>
