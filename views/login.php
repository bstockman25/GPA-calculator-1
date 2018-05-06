<?php
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }
   
    //echo "Recived Header:<br><div>".print_r($_SERVER)."</div><br>";
    //echo "Recived Header2:<br><div>".print_r($http_response_header)."</div><br>";
?>
<h1>Log-In</h1>
<div align = "center">
    <div id = "login">
        <p>Please Login</p>

        <form name="login" action="../api/sLogin.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
            <br>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <br>
            <br>
            <input type="submit" name="submit" value="Submit" />
        </form>
        <br>
        <a href="http://mygpa.ninja/register/">New User Register for MyGPA</a>

    </div>
</div>