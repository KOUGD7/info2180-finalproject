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

    if(preg_match("^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$^", $firstname)){
       if(preg_match("^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$^", $lastname)){
            if(preg_match("^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}^", $password)){
                if(preg_match("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$^", $email)){
                    $valid = True;
                } 
            }
       }
    }
    
    $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
    $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    try {
        if($valid){
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $sqlusername, $sqlpassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Users (firstname, lastname, password, email, date_joined) VALUES('$firstname', '$lastname', '$pwd', '$email', now())";
            $conn->exec($sql);

            $message = "New record created successfully";
            echo "<script>alert('$message');</script>";

        }
        else{
            $message = "Submission Invalid!";
            echo "<script>alert('$message');</script>";
        }   
    } catch (PDOException $pe) {
        die($pe->getMessage());
    }
}
include_once 'dashboard.php';