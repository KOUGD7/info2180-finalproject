<?php
header("Access-Control-Allow-Origin: *");

$query = $_GET['query'];
$query = htmlentities($query);
?>

<?php
if($query=="Home") {
  include_once 'Home.php'
  ?>

<?php
} elseif ($query=="Add") {
  include_once 'AddUser.php'
  ?>

<?php
} elseif($query=="NewIssue") {
  include_once 'NewIssue.php'
  ?>

<?php
} elseif($query=="Logout") {
  include_once 'Logout.php'
  ?>

<?php
} else { ?>
  <h1> TEST Else</h1>
<?php        
    } ?>
