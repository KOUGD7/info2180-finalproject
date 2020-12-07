<?php 
//Testing session - to use sql lookup

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once 'config.php';

$query = $_GET['query'];
$query = htmlentities($query);

if ($query == "filtermy"){
  $sqlq = "SELECT Issues.id as Issueid, Users.id as uid, title, type, status, firstname, lastname, created
  FROM Issues join Users on Issues.assigned_to = Users.id WHERE created_by = $uid";
}
else if($query == "filteropen"){
  $sqlq = "SELECT Issues.id as Issueid, Users.id as uid, title, type, status, firstname, lastname, created
  FROM Issues join Users on Issues.assigned_to = Users.id WHERE status = 'OPEN'";
}
else{
  $sqlq = "SELECT Issues.id as Issueid, Users.id as uid, title, type, status, firstname, lastname, created
  FROM Issues join Users on Issues.assigned_to = Users.id";
}

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
$stmt = $conn->query($sqlq);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

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