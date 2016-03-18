<?php 
session_start();
if ( isset( $_SESSION['username'] ) ){
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
}
if (isset ($_POST['teamS'])){
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
   $team = $_POST['teamS'];
  $ohmyrage = $login->searchTeams($team);
}
?>


<!DOCTYPE html>
<html>
<head>
<title>  </title>
<style>
</style>
</head>
<h1></h1>
<body> 

<form action="" method="post">
  <select name='teamS' >
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
  <input type="submit"  value ="search" name="submit"/>

<p>
</p>
</div>
</form>    
</body>
</html>
 