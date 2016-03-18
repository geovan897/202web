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