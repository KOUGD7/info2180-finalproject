<?php 
//Testing session - to use sql lookup

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

//echo $email;
//echo $uid;

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'bugmeissue';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM Issues");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

#print_r($results);

?>

<div class="mainheader">
    <div>
        <h1 class ="formheader">Issues</h1>
        <div class="filterbar">
            <label>Filter by:</label>
            <li><a href="">ALL</a></li>
            <li><a href="">OPEN</a></li>
            <li><a href="">MY TICKETS</a></li>
        </div>
    </div>
    <div>
        <button class="btn-primary" id="newissue2" name= "newissue2">Create New Issue</button>
    </div>
</div>

<div class="issues">
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

            <td><?= "#".$row['id']; ?>
            <a class="issuedetail" href=""><?= $row['title']; ?></a>
            </td>

            <td><?= $row['type']; ?></td>
            <td><?= $row['status']; ?></td>
            <td><?= $row['assigned_to']; ?></td>
            <td><?= $row['created']; ?></td>
          </tr>
        <?php endforeach; ?>
    </table>
</div>
  

    
  