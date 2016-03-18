<?php
session_start(); //oirginal portion before changes

if ( isset( $_POST['team1'] ) &&  isset($_SESSION['username']) &&  isset($_POST['submitmyTeam'])){
   require_once('clientDB.php.inc');
   $login = new clientDB ("connect.ini");
  $response = $login->addteam($_POST['team1'],$_SESSION['username']);
}
///-------------------------------------------------------------///
if ( isset( $_POST['league'] ) &&  isset($_SESSION['username']) && isset($_POST['submitmyLeague'])){
   require_once('clientDB.php.inc');
   $login = new clientDB ("connect.ini");
  $response2 = $login->addLeague($_POST['league'],$_SESSION['username']);
}
//----------------------------------------------------------------////

if ( isset( $_SESSION['username'] ) ){
  $x =  "<p class='welcome'>Welcome, <a class='removealine' href='logout.php' title=''>".$_SESSION['username']."</a></p>";
  
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
    padding:10px
  }
</style>
</head>
<h1>Manage or view teams </h1>
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
  <option value = "Primeira Liga">Borussia Dortmund</option>
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