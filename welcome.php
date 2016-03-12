<?php

echo 'Welcome '.$_SESSION['username'];



?>

<form action="rpc.php" method="post" >
<input type="submit" name="request" value="logout"/>
</form>