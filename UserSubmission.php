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

    $valid = False;

    if(!preg_match("^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$^", $firstname)){
        echo "Firstname not valid!";
    }
    else if(!preg_match("^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$^", $lastname)){
        echo "Lastname not valid!";
    }
    else if(!preg_match("^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$^", $password)) {
        echo "Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters";
    }
    else if(!preg_match("^[a-zA-Z ]*$^", $email)){
        echo "Must be in the following order: characters@characters.domain!";
    }
    else{
        echo "User Added successfully!";
        $valid = True;
        }return $valid;

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