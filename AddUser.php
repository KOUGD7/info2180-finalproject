<h1 class ="formheader">New User </h1>
    <form  action = "http://localhost/info2180-finalproject/UserSubmission.php" method="post" onsubmit="return validate();">

        <label for="fn">First Name:</label>
        <input type="text" id="fn" class ="input" name="firstname" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required><br>
                
        <label for="ln">Last Name:</label>
        <input type="text" id="ln" class ="input" name="lastname" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required><br>
                
        <label for="em">Email:</label>
        <input type="text" id="em" class ="input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must be in the following order: characters@characters.domain" required><br>
        
        <label for="pw">Password:</label>
        <input type="text" id="pw" class ="input" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
        
        <input type="submit" value="Submit" id="Submit1"  name="Submit1" class="btn-primary"/>
    </form>