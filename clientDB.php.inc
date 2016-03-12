<?php

require_once("error.php.inc");
class clientDB
{
    private $db;
    private $salt;	
    private $logger;
    public function __construct($iniFile)
    {
	$ini = parse_ini_file($iniFile,true);
        $this->logger = new errorLogger("/var/log/it202.log");
	$this->db = new mysqli(
		$ini['loginDB']['host'],
		$ini['loginDB']["user"],
		$ini['loginDB']["password"],
		$ini['loginDB']["db"]);
	$this->salt = $ini['loginDB']['salt'];
	if ($this->db->connect_errno > 0 )
	{
		$this->logger->log(__FILE__.__LINE__."failed to connect to database re: ".$this->db->connect_error);
		exit(0);
	}
	$this->logger->log("testing");
    }
    public function __destruct()
    {
	$this->db->close();
    }

    public function getClientId($name)
    {
	$query = "select clientId from clients where clientName = '$name';";
	$results = $this->db->query($query);
	if (!$results)
	{
	    $this->logger->log("error with results: ".$this->db->error);
	    return 0;
	}
        $client = $results->fetch_assoc();
	if (isset($client['clientId']))
	{
	    return $client['clientId'];
	}
	return 0;
    }

    private function saltPassword($password)
    {
	return $this->db->real_escape_string(sha1($password.$this->salt));
    }

    public function validateClient($name,$password)
    {
	if ($this->getClientId($name) == 0)
        {
	    return array("success"=>false,
		"message"=>"user does not exist");
	}
	$query = "select * from clients where clientName='$name';";
	$results = $this->db->query($query);
	if (!$results)
	{
	    return array("success"=>false,
		"message"=>"db failure");
	}
        $client = $results->fetch_assoc();
        {
	    if ($client['clientPW'] == $this->saltPassword($password))
	    {
		return array("success"=>true);
	    }
        }
        return array("success"=>false,"message"=>"failed to match password");
    }

    public function addNewClient($name,$password)
    {
	if ($this->getClientId($name) != 0)
        {
	    $this->logger->log("user $name already exists!!!!!");
	    $response = array(
		"message"=>"user $name already exists!",
		"success"=>false
		);
	    return $response;
	}
        $now = date("Y-m-d h:i:s",time());
        $name = $this->db->real_escape_string($name);
	$password = $this->saltPassword($password);
        $addQuery = "insert into clients (clientName,clientPW, firstLogin, lastLogin) values ('$name','$password','$now','$now');";
        $results = $this->db->query($addQuery);
	if (!$results)
	{
	    $this->logger->log("error: ".$this->db->error);
	}
	return array("success"=>true);
    }

}
// at this point db is connected
?>
