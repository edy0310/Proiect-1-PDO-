<?php
$dbms = 'mysql';
$host = 'mysql_db'; // Numele serviciului definit în docker-compose.yml
$db = 'flowers2';
$user = 'root';
$pass = 'toor';
$dsn = "$dbms:host=$host;dbname=$db";
$con = new PDO($dsn, $user, $pass);
?>
