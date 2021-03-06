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
    /// trying to see if this will work
    public function teams(){
      $query = "select * from teams order by NumberofTitles DESC;";
      $results = $this->db->query($query);
      echo " <table border ='1'align='right' bgcolor='yellow' >
      <caption>Champtions League Info</caption>
      <tr>
      <th>TeamName</th>
      <th>Country</th>
      <th>TopScorer</th>
      <th>NumberofTitles</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($results)){
      
      echo "<tr>";
      echo "<td>".$row['TeamName']."</td>";
      echo "<td>".$row['Country']."</td>";
      echo "<td>".$row['TopScorer']."</td>";
      echo "<td>".$row['NumberofTitles']."</td>";
      echo "</tr>";
    }
    echo "</table>";
    }
    /// function works
    public function leagues(){
      $query = "select * from LeagueInfo order by LeagueRating DESC;";
      $results = $this->db->query($query);
      echo " <table border ='1'align='left bottom' bgcolor='yellow' '>
      <caption>LeagueRatings</caption>
      <tr>
      <th>League</th>
      <th>LeagueRating</th>
      <th>Country</th>
      <th>TopTeam</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($results)){
      
      echo "<tr>";
      echo "<td>".$row['League']."</td>";
      echo "<td>".$row['LeagueRating']."</td>";
      echo "<td>".$row['Country']."</td>";
      echo "<td>".$row['TopTeam']."</td>";
      echo "</tr>";
    }
    echo "</table>";
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
    /// Inserting a function to salt the secret question
    
    
    private function saltSecret($secret)
    {
	return $this->db->real_escape_string(sha1($secret.$this->salt));
    
    }
   
    /// Top function is prototype
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
	    if (($client['clientPW'] == $this->saltPassword($password)) && $client['permissions'] == '1')
	    {
		return array("success"=>true);
	    } else {
		return array ("success"=>false,"message"=>"your account needs to be authorized");
	    } // this where i started fucking around 
           
           if (($client['clientPW'] !== $this->saltPassword($password)) && $client['permissions'] == '1')
	   {
		return array("success"=>false,"message"=>"failed to match password");
		
	   }
	}
    }

    public function addNewClient($name,$password,$secret) // must add the $secret parameter to add my secret
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
	$secret = $this->saltSecret($secret); // salting the secret
        $addQuery = "insert into clients (clientName, clientPW, secret,permissions, firstLogin, lastLogin) values ('$name','$password','$secret','1','$now','$now');"; //Must add the secret here too
        $results = $this->db->query($addQuery);
        $quer1 = "insert into userprofiles (clientName) values ('$name');";
	$resultado = $this->db->query($quer1);
	if (!$results)
	{
	    $this->logger->log("error: ".$this->db->error);
	}
	return array("success"=>true);
    }
    // function to reset password must test it
    public function resetPassword($username,$recovery,$newpass)
    {
	$query = "select * from clients where clientName = '$username' and secret = '$recovery'";
	$results = $this->db->query($query);
	
	if (!$results)
	{  
	  return "Sorry there was an error";
	}
	$np = $this->saltPassword($newpass); // salting the secret
	$query2 = "Update clients set clientPW = '$np' where clientName = '$username'";
	$res2 = $this->db->query($query2);
	
	if (!$res2) {
	    return " Sorry there was an error changing your password";
	}
	if ($res2) {
	    return "Be easy we successfully reset your password";
	}
     
    
    
    }
    
    //add a team below
    public function addTeam($team1,$username)
    {
      $query = "select * from userprofiles where team = '$team1' and clientName ='$username'";
      
      $result = $this->db->query($query);
      
      if (!$result){
	 return " Sorry we had an error";
      }
	$query1 = "Update userprofiles set team = '$team1' where clientName = '$username'";
	$res = $this->db->query($query1);
      if (!$res){
	  return " Sorry there was an error adding your team";
      }
      if ($res){
	return "We have added your team successfully";
      }
     
      
    } 
    // add a league below
   public function addLeague($League1,$username)
   {
      $query = "select * from userprofiles where  league= '$League1' and clientName ='$username'";
      
      $result = $this->db->query($query);
      
      if (!$result){
	 return "sorry there was an error";
      }
     
	$query1 = "Update userprofiles set league = '$League1' where clientName = '$username'";
	$details = $this->db->query($query1);
      if (!$details){
	  return "error";
      }
      if ($details){
	return "We have added your League successfully";
      }
   }
   
   /// view a leagues Info
   
   public function searchLeague($League)
   {
      //echo "this piece of shit received the parameter   ".$League; // this verified I am able to pass the parameter successfully
      
      $query = "select * from LeagueInfo where League = '$League'";
      $pieceofshit = $this->db->query($query);
      echo " <table border ='1'align='right' bgcolor='yellow' '>
      <caption>LeagueRatings</caption>
      <tr>
      <th>League</th>
      <th>LeagueRating</th>
      <th>Country</th>
      <th>TopTeam</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($pieceofshit)){
      
      echo "<tr>";
      echo "<td>".$row['League']."</td>";
      echo "<td>".$row['LeagueRating']."</td>";
      echo "<td>".$row['Country']."</td>";
      echo "<td>".$row['TopTeam']."</td>";
      echo "</tr>";
    }
    echo "</table>";
   }
   // function to view an individual teams info
    public function searchTeams($team)
   {
 
      $query = "select * from teams where TeamName = '$team'";
      $pieceofshit1 = $this->db->query($query);
      echo " <table border ='1'align='right' bgcolor='yellow' '>
      <caption>Teams</caption>
      <tr>
      <th>TeamName</th>
      <th>Country</th>
      <th>TopScorer</th>
      <th>NumberofTitles</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($pieceofshit1)){
      
      echo "<tr>";
      echo "<td>".$row['TeamName']."</td>";
      echo "<td>".$row['Country']."</td>";
      echo "<td>".$row['TopScorer']."</td>";
      echo "<td>".$row['NumberofTitles']."</td>";
      echo "</tr>";
    }
    echo "</table>";
   }
   // to view bookmarked items
    public function bookMarks($user)
   {
      
      $query = "select * from userprofiles where clientName = '$user'";
      $pieceofshit1 = $this->db->query($query);
      echo " <table border ='1'align='center' bgcolor='yellow' '>
      <caption>BookMarks</caption>
      <tr>
      <th>ClientName</th>
      <th>Team</th>
      <th>League</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($pieceofshit1)){
      
      echo "<tr>";
      echo "<td>".$row['clientName']."</td>";
      echo "<td>".$row['team']."</td>";
      echo "<td>".$row['league']."</td>";
      echo "</tr>";
    }
    echo "</table>";
   }
  
}
// at this point db is connected
?>
