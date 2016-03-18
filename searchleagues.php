<?php

if ( isset( $_POST['searchLeague'] ) &&  isset($_SESSION['username'])){
   require_once('clientDB.php.inc');
   $login = new clientDB ("connect.ini");
  $response3 = $login->LeagueInfo($_POST['searchLeague']);
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

</style>
</head>
<h1>Manage or view teams </h1>
<body> 

<form action="" method="post">  
<div class="right">
  <select name='league' >
  <option value = "La Liga">La Liga</option>
  <option value = "Bundesliga">Bundesliga</option>
  <option value = "Premier League">Barclays Premier League</option>
  <option value = "Serie A">Calcio Serie A</option>
  <option value = "Ligue 1">France Ligue 1</option>
  <option value = "Primeira Liga">Borussia Dortmund</option>
  <option value = "Eredevisie">Netherlands Eredevisie</option>
  
  </select>
  <input type="submit"  value ="searchLeague" name="submitmyLeague"/>
  
<p>
<?php
if (isset($_POST['searchLeague'])){
    echo $response3;
}
?>
</p>
</div>
</form>    
</body>
</html>