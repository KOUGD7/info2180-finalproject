<?php

header("Access-Control-Allow-Origin: *");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once 'config.php';

$query = $_GET['query'];
$query = htmlentities($query);

$id = $_GET['id'];
$id = htmlentities($id);

if ($query == "closed"){
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
		$sql = "UPDATE Issues SET status ='CLOSED', updated = now() WHERE id = $id";
		$conn->exec($sql);
		#echo $sql;

        $message = "Status Updated";
        echo "<script>alert('$message');</script>";
	} 
	catch (PDOException $pe) {
		die($pe->getMessage());
	}
}
else if ($query == "progress"){
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
		$sql = "UPDATE Issues SET status ='IN PROGRESS', updated = now() WHERE id = $id";
		$conn->exec($sql);
		
        $message = "Status Updated";
        echo "<script>alert('$message');</script>";
	} 
	catch (PDOException $pe) {
		die($pe->getMessage());
	}
}

include_once 'Home.php';






