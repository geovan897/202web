<?php
session_start(); //oirginal portion before changes

//echo ' Welcome '.$_SESSION['username']; // this is the original portion before changes </p>";
//$user = $_SESSION['username'];

if ( isset( $_POST['team'] ) &&  isset($_SESSION['username'])){
   require_once('clientDB.php.inc');
   $login = new clientDB ("connect.ini");
  $response = $login->addteam($_POST['team'],$_SESSION['username']);
  //$response = $login->teams(); this portion and the
   
   
 
}

if ( isset( $_SESSION['username'] ) ){
  $x =  "<p class='welcome'>Welcome, <a class='removealine' href='logout.php' title=''>".$_SESSION['username']."</a></p>";
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
 // $result = $login->addteam($_SESSION['username']);
  //$response = $login->teams(); this portion and the code below works fine but we need to make a nav bar for the list of teams in a league
 //$response2 = $login->leagues();

 }
 
 ?>
 <html>
 <body>
 
 <form action="" method="post">
  <select name='team' >
  <option value = "Real Madrid"> Real Madrid Fc </option>
  <option value = "Barcelona"> Barcelona Fc </option>
  <option value = "Bayern Munich"> Bayern Munich Fc </option>
  <option value = "Shalke 04"> Shalke 04 </option>
  <option value = "Borussia Dortmund">Borussia Dortmund</option>
  <option value = "Juventus"> Juventus </option>
  <option value = "Milan"> Milan </option>
  <option value = "AS Monaco"> Monaco </option>
  <option value = "Arsenal"> Arsenal </option>
  <option value = "Atletico Madrid"> Atletico Madrid </option>
  <option value = "Chelsea"> Chelsea Fc </option>
  <option value = "Paris Saint-Germain"> PSG </option>
  <option value = "Manchester City"> Manchester City </option>
  <option value = "Manchester United"> Manchester United </option>
  <option value = "Napoli"> Napoli </option>
  </select>
  
  
  <input type="submit"  value ="submit" name="submit"/>
<?php  

//$teams = array ('Real Madrid','Barcelona','Bayern Munich','Shalke 04','Borussia Dortmund','Juventus','Milan', 'AS Monaco','Arsenal','Atletico Madrid',
//'Chelsea','Paris Saint-Germain','Manchester City','Manchester United','Napoli');
														

?>
</form>    

<h2> <?php echo $response; ?> </h2>
</body>
</html>