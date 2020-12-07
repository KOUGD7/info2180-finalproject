<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $email= $_POST['email'];

    $pwd = password_hash($password, PASSWORD_DEFAULT);

    try {
    
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $sqlusername, $sqlpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Users (firstname, lastname, password, email, date_joined) VALUES('$firstname', '$lastname', '$pwd', '$email', now())";
        $conn->exec($sql);

        $message = "New record created successfully";
        echo "<script>alert('$message');</script>";
        
    } catch (PDOException $pe) {
        die($pe->getMessage());
    }
}
include_once 'dashboard.php';