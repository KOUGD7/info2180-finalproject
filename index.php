<?php

session_start();


#$host = 'localhost';
#$sqlusername = 'lab5_user';
#$sqlpassword = 'password123';
#$dbname = 'bugmeissue';

require_once 'config.php';

#to ensure only form create for website is accepted by serveer
$hidden 	= 	$_POST["test"];
$formID 	=   "a7fcdc6d1d3ec4671a352b64e319909d";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $hidden === $formID) {

    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $email = htmlentities($email);
    $pwd = htmlentities($pwd);




    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
    $stmt = $conn->query("SELECT id, email, password FROM Users WHERE Users.email ='$email';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    #Connect to database and lookup email and password using email from the form (replace 'admin@project2.com' and 'password123' with result)
    /* $dbemail = 'admin@project2.com';
    $dbpassword = 'password123'; */

    foreach ($results as $row):
        $dbid = $row['id'];
        $dbemail = $row['email'];
        $dbpassword = $row['password'];
    endforeach;

    if (password_verify($pwd, $dbpassword)) {
    #if ($email == $dbemail){
        
        $_SESSION['email'] = $dbemail;
        $_SESSION['userid'] = $dbid;
        #get autoincremented id from user and store in session so that it can be use across multiple pages

        include_once 'dashboard.php';

    } else{
        #message that email or password is incorrect should be included
        header('Location: http://localhost/info2180-finalproject/login.html');
        session_unset();
        session_destroy();
    }
}
else{
    #message that email or password is incorrect should be included
    header('Location: http://localhost/info2180-finalproject/login.html');
    session_unset();
    session_destroy();
}
