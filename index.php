<?php
require_once("Connection.php");

//A CHANGER 
$con=new Connection($dsn,$user,$pass);

$query = "SELECT * FROM tache"; 

echo $con->executeQuery($query, array());

$results=$con->getResults();
Foreach ($results as $row)
	var_dump($row); 
}
catch( PDOException $Exception ) {
echo 'erreur';
echo $Exception->getMessage();}
?>

</body>
</html>
