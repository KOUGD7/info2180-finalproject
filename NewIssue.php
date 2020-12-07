<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$uid = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once 'config.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $sqlusername, $sqlpassword);
$stmt = $conn->query("SELECT * FROM Users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h1 class ="formheader">Create Issue</h1>
<form action = "http://localhost/info2180-finalproject/IssueSubmission.php" method="post" onsubmit="return validate();">
    <label for="ti">Title:</label>
    <input type="text" id="ti" class ="input" name="title" required>
    
    <label for="de">Description</label>
    <input type="text" id="de" class ="input" name="description" required><br>
    
    <label for="as">Assigned To</label>
    <!-- <input type="text" id="as" class ="input" name="assignedTo" required><br> -->
    <select name="assignedTo" id="as" class ="input">
        <?php foreach ($results as $row): ?>
            <option value= <?= $row['id']; ?> >
                <?= $row['firstname']. " ". $row['lastname']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    
    <label for="ty">Type</label>
    <select name="type" id="ty" class ="input" required>
    <option value="Bug">Bug</option>
    <option value="Propsal">Proposal</option>
    <option value="Task">Task</option>
    </select><br>


    <label for="pr">Priority</label>
    <select name="priority" id="pr" class ="input" required>
    <option value="Minor">Minor</option>
    <option value="Major">Major</option>
    <option value="Critical">Critical</option>
    </select><br>


    <input type="submit" class="btn-primary">
</form>