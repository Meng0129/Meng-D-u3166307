<?php
$server = '127.0.0.1:3306';
$username = 'root';
$password = 'new_pass'; // Yout Database root PASSWORD for localhost!
$database = 'form1';

try{
	$db = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die("Connection failed: " .$e->getMessage());
}