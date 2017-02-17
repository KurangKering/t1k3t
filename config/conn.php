<?php 
try {
	$db_name = 'tiket';
	$username = 'root';
	$password = 'asd';
	$db = new PDO('mysql:host=127.0.0.1;dbname='.$db_name, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (Exception $e) {
	echo $e->getMessage();
	die();
}
