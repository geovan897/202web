<?php
session_start(); 

if ( isset( $_POST['team1'] ) &&  isset($_SESSION['username']) &&  isset($_POST['submitmyTeam'])){
   require_once('clientDB.php.inc');
   $login = new clientDB ("connect.ini");
   $team = $_POST['team1']; // trying to clean my session variables;
   $user1 = $_SESSION['username']; // doing the same as the line above
  $response = $login->addteam($team,$user1);
}
///-------------------------------------------------------------///
if ( isset( $_POST['league'] ) &&  isset($_SESSION['username']) && isset($_POST['submitmyLeague'])){
   require_once('clientDB.php.inc');
   $login = new clientDB ("connect.ini");
   $league = $_POST['league'];
   $user2 = $_SESSION['username'];
  $response2 = $login->addLeague($league,$user2);
}
//----------------------------------------------------------------////
if ( isset( $_SESSION['username'] ) ){
  
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
}
 
?>
<!DOCTYPE html>
<html>
<head>
<title>  </title>
<style>

    
.right {
    position: absolute;
    right: 0px;
    width: 300px;
    border: 3px solid #4682B4;
    padding: 10px;
}
.left {
    position: absolute;
    left: 0px;
    width: 300px;
    border: 3px solid #708090;
    padding:10px;
  }
.bottomright {
    position:absolute;
    bottom:200px;
    right:0;
    width: 300px;
    border: 3px solid #000066;
    padding:10px;
}
.bottomleft {
    position:absolute;
    bottom:200;
    left:0;
    width: 300px;
    border: 3px solid #280000;
    padding:10px;
}
    
    
</style>
</head>
<h1> Pick a team and a league </h1>
<body> 
 
<div class="right">
 <form action="" method="post">
  <select name='team1' >
  <option value = "Ajax">Ajax Fc</option>
  <option value = "Aston Villa">Aston Villa Fc</option>
  <option value = "Barcelona"> Barcelona </option>
  <option value = "Bayern Munich">Bayern Munich</option>
  <option value = "Benfica">Benfica</option>
  <option value = "Borussia Dortmund">Borussia Dortmund</option>
  <option value = "Chelsea">Chelsea</option>
  <option value = "Internazionale">Internazionale</option>
  <option value = "Juventus">Juventus</option>
  <option value = "Liverpool">Liverpool</option>
  <option value = "Manchester United">Manchester United</option>
  <option value = "Marseille">Marseille</option>
  <option value = "Milan">Milan</option>
  <option value = "Porto">Manchester United</option>
  <option value = "Real Madrid">Real Madrid</option>
  </select>
  <input type="submit"  value ="submitmyTeam" name="submitmyTeam"/>
  
<p>  
<?php 
if ( isset( $_POST['submitmyTeam'] ) ){
echo $response;
  }
?>
</p>
</div>   
  
<div class="left">
  <select name='league' >
  <option value = "La Liga">La Liga</option>
  <option value = "Bundesliga">Bundesliga</option>
  <option value = "Premier League">Barclays Premier League</option>
  <option value = "Serie A">Calcio Serie A</option>
  <option value = "Ligue 1">France Ligue 1</option>
  <option value = "Primeira Liga">Primeira Liga</option>
  <option value = "Eredevisie">Netherlands Eredevisie</option>
  
  </select>
  <input type="submit"  value ="submitmyLeague" name="submitmyLeague"/>
  
<p>
<?php
if (isset($_POST['submitmyLeague'])){
echo $response2;
}
?>
</p>
</div>
</form>    
</body>
</html>