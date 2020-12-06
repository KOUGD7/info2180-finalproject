<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign-up Page</title>
    <link rel="stylesheet" type="text/css" href="styles/styles1.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="scripts/bug.js" type="text/javascript"></script>
    <script src="scripts/form.js" type="text/javascript"></script>

</head>
<body>
    <header>
        <p> BugMe Issue Tracker</p>

    </header>

    <div class="sidebar">
        <ul>
            <li><img src="img/home.png" width="25px" height="25px"  /><a id="home" href="#">Home</a></li>
            <li><img src="img/add.png" width="25px" height="25px"  /><a id="add" href="#">Add User</a></li>
            <li><img src="img/issue.png" width="25px" height="25px"  /><a id="newissue" href="#">New Issue</a></li>
            <li><img src="img/log.png" width="22px" height="22px"  /><a id="logout" href="http://localhost/info2180-finalproject/index.php">Logout</a></li>
        </ul>
    </div>

    <main>
         <div>
            <div id="result" class="user-form">

            <?php include 'Home.php'?>
            
            </div>
        </div>
    </main>

</body>
</html>