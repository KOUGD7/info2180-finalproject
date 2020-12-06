<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $assignedTo = $_POST['assignedTo'];
    $type= $_POST['type'];
    $priority= $_POST['priority'];
    $date = date('m/d/Y h:i:s', time());

    $assignedTo = 1;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $sqlusername, $sqlpassword);
        
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql= "INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, created, updated)
                            VALUES('$title', '$description', '$type', '$priority', 'Open', $assignedTo, $uid, now(), now())";
        $conn->exec($sql);
        echo "New record created successfully";

    } 
   catch (PDOException $pe) {
        die($pe->getMessage());
   }
}

include_once 'dashboard.php';
