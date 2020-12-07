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

?>

 <main>
    <div class="xss-container">
            <div class="isu1">
                <h1><?= $row['title']; ?></h1>
                <p class="is">Issue #<?= $row['id']; ?> </p>
           </div>

           <div class="isu2">
        	   <p class="des"> <?= $row['description']; ?> </p>
            	<ul>
                    <li>Issue created on <?= $row['created']; ?> by <?= $row['created_by']; ?></li>
                    <li>Last Updated on <?= $row['updated']; ?></li>
                </ul>
            </div>


        <div class="isu3">
        	<aside>
        		<div class="sidebox">
    	    		<p>Assigned To</p> 
    	    		<p><?= $row['assigned_to']; ?></p> 
    	    		<br>
    				<p>Type:</p>
    				<p><?= $row['type']; ?></p>	
    	    		<br>
    				<p>Priority:</p>
    				<p><?= $row['priority']; ?></p>	
    	    		<br>
    				<p>Status:</p>
    				<p><?= $row['status']; ?></p>	
        		</div>
        	</aside>
        

        	<div class="btn">
        		<button type="submit" name = "closed" class="closed" id="closed" value=<?= $row['id']; ?>>Marked as Closed</button>
        		<br>
        		<button type="submit" name = "progress" class="progress" id="progress" value=<?= $row['id']; ?>>Marked In Progress</button>
        	</div>
        </div>
</div>
    </main>




