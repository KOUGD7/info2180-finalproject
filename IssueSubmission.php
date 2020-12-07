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

    #$assignedTo = 1;

    $valid = False;

    if(preg_match("^[a-zA-Z ]*$^", $title)){
        if(preg_match("^[a-zA-Z ]*$^", $description)){
             if(preg_match("^\+?[1-9]\d*$^", $assignedTo)){
                if(preg_match("^[a-zA-Z ]*^", $type)){
                    if(preg_match("^[a-zA-Z ]*$^", $priority)){
                             $valid = True;
                     }
                }
            }
        }
    }


    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $description = filter_var($description, FILTER_SANITIZE_STRING);
    $assignedTo = filter_var($assignedTo, FILTER_SANITIZE_NUMBER_INT);
    $type = filter_var($type, FILTER_SANITIZE_STRING);
    $priority = filter_var($priority, FILTER_SANITIZE_STRING);

    


    try {
        if($valid){

            $conn = new PDO("mysql:host=$host;dbname=$dbname", $sqlusername, $sqlpassword);
            
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql= "INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, created, updated)
                                VALUES('$title', '$description', '$type', '$priority', 'Open', $assignedTo, $uid, now(), now())";
            $conn->exec($sql);
            $message = "New record created successfully";
            echo "<script>alert('$message');</script>";
        }
        else{
            $message = "Submission Invalid!";
            echo "<script>alert('$message');</script>";
        }
    } 
   catch (PDOException $pe) {
        die($pe->getMessage());
   }
}

include_once 'dashboard.php';
