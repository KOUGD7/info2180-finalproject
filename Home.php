<?php 
//Testing session - to use sql lookup

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

//echo $email;
//echo $uid;

require_once 'config.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
$stmt = $conn->query("SELECT Issues.id as Issueid, Users.id as uid, title, type, status, firstname, lastname, created
 FROM Issues join Users on Issues.assigned_to = Users.id");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
#print_r($results)
?>

<div class="mainheader">
    <div>
        <h1 class ="formheader">Issues</h1>
        <div class="filterbar">
            <label>Filter by:</label>
            <li><a class="filter" id="filterall" name="filterall">ALL</a></li>
            <li><a class="filter" id="filteropen" name="filteropen" >OPEN</a></li>
            <li><a class="filter" id="filtermy" name="filtermy" >MY TICKETS</a></li>
        </div>
    </div>
    <div>
        <button class="btn-primary" id="newissue2" name= "newissue2">Create New Issue</button>
    </div>
</div>

<div class="issues" id="tableissues">
    <table class="issueLog" id = "issuetab">
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Status</th>
            <th>Assigned To</th>
            <th>Created</th>            
        </tr>

        <?php foreach ($results as $row): ?>
          <tr>
        
            <td> 
                <?= "#".$row['Issueid']; ?>
                <a class="issuedetail" id="issuelink" name="issuelink" value =<?=$row['Issueid']?>>
                <?= $row['title']; ?></a>
            </td>
        
            <td><?= $row['type']; ?></td>
            <td><?= $row['status']; ?></td>
            <td><?= $row['firstname']." ".$row['lastname']; ?></td>
            <td><?= $row['created']; ?></td>
          </tr>
        <?php endforeach; ?>
    </table>
</div>
  

    
  