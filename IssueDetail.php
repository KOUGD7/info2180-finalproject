<?php

header("Access-Control-Allow-Origin: *");

$query = $_GET['issueid'];
$query = htmlentities($query);


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once 'config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
    $stmt = $conn->query("SELECT * FROM Issues WHERE id = $query");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 
catch (PDOException $pe) {
    die($pe->getMessage());
}


foreach ($results as $row):
    $dbid = $row['id'];
    $dbtitle = $row['title'];
    $dbdescrip = $row['description'];
    $dbcreated = $row['created'];
    $dbupdated = $row['updated'];
    $dbcreatedby = $row['created_by'];
    $dbassign = $row['assigned_to'];
    $dbtype = $row['type'];
    $dbpriorty = $row['priority'];
    $dbstatus = $row['status'];
endforeach;



try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
    $stmt = $conn->query("SELECT firstname, lastname FROM Users WHERE id = $dbassign");
    $results2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 

catch (PDOException $pe) {
    die($pe->getMessage());
}

foreach ($results2 as $row):
    $dbassignf = $row['firstname'];
    $dbassignl = $row['lastname'];
endforeach;


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
    $stmt = $conn->query("SELECT firstname, lastname FROM Users WHERE id = $dbcreatedby");
    $results3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 

catch (PDOException $pe) {
    die($pe->getMessage());
}

foreach ($results3 as $row):
    $dbcreatef = $row['firstname'];
    $dbcreatel = $row['lastname'];
endforeach;

?>

<div class="xss-container">
    <div class="isu1">
            <h1><?= $dbtitle; ?></h1>
            <p class="is">Issue #<?= $dbid; ?> </p>
        </div>

        <div class="isu2">
        	<p class="des"> <?= $dbdescrip; ?> </p>
            <ul>
                <li>Issue created on <?= $dbcreated; ?> by <?= $dbcreatef." ".$dbcreatel; ?></li>
                <li>Last Updated on <?= $dbupdated; ?></li>
            </ul>
        </div>


    <div class="isu3">
        <aside>
        	<div class="sidebox">
    	    	<p>Assigned To</p> 
    	    	<p><?= $dbassignf." ".$dbassignl; ?></p> 
    	    	<br>
    			<p>Type:</p>
    			<p><?= $dbtype; ?></p>	
    	    	<br>
    			<p>Priority:</p>
    			<p><?= $dbpriorty; ?></p>	
    	    	<br>
    			<p>Status:</p>
    			<p><?= $dbstatus; ?></p>	
        	</div>
        </aside>
        

        <div class="btn">
        	<button type="submit" name = "closed" class="closed" id="closed" value=<?= $dbid; ?>>Marked as Closed</button>
        	<br>
        	<button type="submit" name = "progress" class="progress" id="progress" value=<?= $dbid; ?>>Marked In Progress</button>
        </div>
    </div>

   



	



