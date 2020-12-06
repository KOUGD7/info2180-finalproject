<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once 'config.php';

try {
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $sqlusername, $sqlpassword);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $emai= $_POST['email'];
        $insertdata= "INSERT INTO Users (firstname. lastname, password, email) VALUES($firstname, $lastname, $password, $emai)";
        $stmt = $conn->query($insertdata);
		$results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);
    }
} catch (PDOException $pe) {
    die($pe->getMessage());
}