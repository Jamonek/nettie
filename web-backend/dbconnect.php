<?php

$username = "root";
$password = "";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try{
$pdo = new PDO('mysql:host=localhost;dbname=Discova', $username, $password, $options);

}

catch(PDOException e){
echo e->getMessage();
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
header('Content-Type: text/html; charset=utf-8');



?>

