<h1>NEW USER</h1>
    <form  action = "http://localhost/info2180-finalproject/Submission.php" method="post" onsubmit="return validate();">

        <label for="fn">First Name:</label>
        <input type="text" id="fn" name="firstname"><br>
                
        <label for="ln">Last Name:</label>
        <input type="text" id="ln" name="lastname"><br>
                
        <label for="pw">Password:</label>
        <input type="text" id="pw" name="password"><br>
                
        <label for="em">Email:</label>
        <input type="text" id="em" name="emai"><br>
        
        <input type="submit" value="Submit" id="Submit1" name="Submit1" class="btn-primary"/>
    </form>