<h1 class ="formheader">NEW USER </h1>
    <form  action = "http://localhost/info2180-finalproject/UserSubmission.php" method="post" onsubmit="return validate();">

        <label for="fn">First Name:</label>
        <input type="text" id="fn" class ="input" name="firstname" required><br>
                
        <label for="ln">Last Name:</label>
        <input type="text" id="ln" class ="input" name="lastname" required><br>
                
        <label for="em">Email:</label>
        <input type="text" id="em" class ="input" name="email" required><br>
        
        <label for="pw">Password:</label>
        <input type="text" id="pw" class ="input" name="password" required><br>
        
        <input type="submit" value="Submit" id="Submit1"  name="Submit1" class="btn-primary"/>
    </form>