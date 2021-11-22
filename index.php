<?php
require_once("Connection.php");

//A CHANGER 
$user= 'root';
$pass='toutdouxliste15@';
$dsn='mysql:host=2.tcp.ngrok.io:12519;dbname=toutdouxliste';
try{
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
