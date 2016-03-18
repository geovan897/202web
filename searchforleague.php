<?php 
session_start();
if ( isset( $_SESSION['username'] ) ){
  $x =  "<p class='welcome'>Welcome, <a class='removealine' href='logout.php' title=''>".$_SESSION['username']."</a></p>";
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
}
if (isset ($_POST['searchmyleague'])){
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
   $league = $_POST['searchmyleague'];
  $result = $login->searchLeague($league);

  
 
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
  <select name='searchmyleague' >
  <option value = "La Liga">La Liga</option>
  <option value = "Bundesliga">Bundesliga</option>
  <option value = "Premier League">Barclays Premier League</option>
  <option value = "Serie A">Calcio Serie A</option>
  <option value = "Ligue 1">France Ligue 1</option>
  <option value = "Primeira Liga">Borussia Dortmund</option>
  <option value = "Eredevisie">Netherlands Eredevisie</option>
  
  </select>
  <input type="submit"  value ="search" name="submit"/>
  
<p>
</p>
</div>
</form>    
</body>
</html>