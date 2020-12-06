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
        $title = $_POST['title'];
        $description = $_POST['description'];
        $assignedTo = $_POST['assignedTo'];
        $type= $_POST['type'];
        $priority= $_POST['priority'];

        $insertdata= "INSERT INTO Issue (title, description, assigned_to, type, priority, status)
                    VALUES($title, $description, $assignedTo, $type, $priority, 'Open')";
        $stmt = $conn->query($insertdata);
		$results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);
    } 
}catch (PDOException $pe) {
    die($pe->getMessage());
}