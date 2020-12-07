$( document ).ready(function() {

    var httpRequest = new XMLHttpRequest();
    
    var url = "http://localhost/info2180-finalproject/bug.php?query=";
    var result = document.querySelector("#result");
    var display = document.querySelector("html");

    let home = $("#home");
    let newissue = $("#newissue");
    let add = $("#add");
    let logout = $("#logout");


    //HOME AJAX
    home.on('click', function() {
        httpRequest.onreadystatechange = UpdateResult;
        httpRequest.open('GET', url + "Home");
        httpRequest.send();
    });

    //NEW ISSUE AJAX
    newissue.on('click', function() {
        httpRequest.onreadystatechange = UpdateResult;
        httpRequest.open('GET', url + "NewIssue");
        httpRequest.send();
    });

    //ADD AJAX
    add.on('click', function() {
        httpRequest.onreadystatechange = UpdateResult;
        httpRequest.open('GET', url + "Add");
        httpRequest.send();
    });

    //NEW ISSUE AJAX (BUTTON ABOVE TABLE)
    $(document).on('click', '[name="newissue2"]', function(){
        httpRequest.onreadystatechange = UpdateResult;
        httpRequest.open('GET', url + "NewIssue");
        httpRequest.send();
     });


    function UpdateResult() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                result.innerHTML = response;
                      
            } 
            else {
                console.log(httpRequest.status)
                alert('There was a problem with the request.');
             }
        }
    }



     $(document).on('click', '[name="issuelink"]', function(){
        var value = $(this).attr("value");
        /*alert(value); */
        var url = "http://localhost/info2180-finalproject/IssueDetail.php?issueid="
        httpRequest.onreadystatechange = getDetails;
        httpRequest.open('GET', url + value);
        httpRequest.send();

     });

     function getDetails() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                result.innerHTML = response;
                      
            } 
            else {
                console.log(httpRequest.status)
                alert('There was a problem with the request.');
             }
        }
    }


    $(document).on('click', '[name="closed"]', function(){
        var stat = "closed";
        var value = $(this).attr("value");
        var url = "http://localhost/info2180-finalproject/status.php?query=" + stat + "&id=" + value;
        alert(url);
        httpRequest.onreadystatechange = updatestat;
        httpRequest.open('GET', url);
        httpRequest.send();

     });

     $(document).on('click', '[name="progress"]', function(){
        var stat = "progress";
        var value = $(this).attr("value");
        var url = "http://localhost/info2180-finalproject/status.php?query=" + stat + "&id=" + value;
        alert(url);
        httpRequest.onreadystatechange = updatestat;
        httpRequest.open('GET', url);
        httpRequest.send();

     });

     function updatestat() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                result.innerHTML = response;
                      
            } 
            else {
                console.log(httpRequest.status)
                alert('There was a problem with the request.');
             }
        }
    }
    

    $(document).on('click', '[class="filter"]', function(){
        var value = $(this).attr("name");
        var url = "http://localhost/info2180-finalproject/filter.php?query="
        httpRequest.onreadystatechange = getfilter;
        httpRequest.open('GET', url + value);
        httpRequest.send();

     });

     function getfilter() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                var tab =  document.querySelector("#tableissues");
                tab.innerHTML = response;        
            } 
            else {
                console.log(httpRequest.status)
                alert('There was a problem with the request.');
             }
        }
    }

});