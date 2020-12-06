<h1 class ="formheader">Create Issue</h1>
<form action = "http://localhost/info2180-finalproject/IssueSubmission.php" method="post" onsubmit="return validate();">
    <label for="ti">Title:</label>
    <input type="text" id="ti" class ="input" name="title">
    
    <label for="de">Description</label>
    <input type="text" id="de" class ="input" name="description"><br>
    
    <label for="as">Assigned To</label>
    <input type="text" id="as" class ="input" name="assignedTo"><br>
    
    <label for="ty">Type</label>
    <select name="type" id="ty" class ="input">
    <option value="bug">Bug</option>
    <option value="propsal">Proposal</option>
    <option value="task">Task</option>
    </select><br>


    <label for="pr">Priority</label>
    <select name="priority" id="pr" class ="input">
    <option value="Minor">Minor</option>
    <option value="Major">Major</option>
    <option value="Critical">Critical</option>
    </select><br>


    <input type="submit" class="btn-primary">
</form>