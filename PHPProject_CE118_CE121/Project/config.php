<?php
try{
	$dbhandler = new PDO('mysql:host=localhost;dbname=HotelManagement_db','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}

?>