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
ul {
   list-style-type: none;
    position:absolute;
    bottom:250px;
    left:0px;
    margin: 0px;
    padding: 0px;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
    background-color: #555;
    color: white;
}
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
<ul>
  <li><a href="logout.php">Log Out</a></li>
  <li><a href="Champsleague.php">Champions League Info</a></li>
  <li><a href="searchforleague.php">Search Leagues</a></li>
  <li><a href="searchforteams.php">Search Teams</a></li>
   <li><a href="userteams.php"> Add Teams </a><li>
  <li><a href="bookmarks.php"> My bookmarked Items</a></li>
</ul>

</body>
</html>
 