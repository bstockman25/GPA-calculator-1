
<!doctype html>
<html>
    <head>
        <title>Register MyGPA-Calculator</title>
        <link rel="stylesheet" href="../style.css">
        <script language='javascript' type='text/javascript'>
            function check(input) {
                if (input.value != document.getElementById('password').value) {
                    input.setCustomValidity('Password Must be Matching.');
                } else {
                    // input is valid -- reset the error message
                    input.setCustomValidity('');
                }
            }
            /*function submitForm(oFormElement)
            {
                var xhr = new XMLHttpRequest();
                xhr.onload = function(){ alert (xhr.responseText); } // success case
                xhr.onerror = function(){ alert (xhr.responseText); } // failure case
                xhr.open (oFormElement.method, oFormElement.action, true);
                xhr.send (new FormData (oFormElement));
                return false;
            }*/
        </script>
    </head>
    <body>
        <div class="main">
            <div class="navbar">
                <nav id="nav02">
                    <ul id="menu2">
                        <li>
                            <a href="http://mygpa.ninja/">MyGPA</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="center">
                <div id="left-stripe"></div>
                <div id="right-stripe"></div>
                <div id="content">
                    <h1>Register new user</h1>
                        <div align = "center">
                    <div id = "login">
                        <p>Please Register</p>
                        <?php echo "User IP address: ".$_SERVER['REMOTE_ADDR']."<br><br>";?>
                        <!--form action = "../api/sRegister.php" method='post' onsubmit="return submitForm(this);"-->
                        <form action = "../api/sRegister.php" method='post'>
                            <label for="fname">First Name:</label>
                            <input type="text" required name="fname" id="fname">
                            <br>
                            <br>
                            <label for="lname">Last Name:</label>
                            <input type="text" required name="lname" id="lname">
                            <br>
                            <br>
                            <label for="username">Username:</label>
                            <input type="text" required name="username" id="username">
                            <br>
                            <br>
                            <label for="uemail">Email:</label>
                            <input type="text" required name="uemail" id="uemail">
                            <br>
                            <br>
                            <label for="password">Password:</label>
                            <input type="password" required name="password" id="password">
                            <br>
                            <br>
                            <label for="password_confirm">Confirm Password:</label> 
                            <input type="password" required name="password_confirm" id="password_confirm" oninput="check(this)">
                            <br>
                            <br>
                            <input type="submit" name="submit" value="Submit">
                        </form>
                        </p>
                    </div>

                </div>
            </div>
            
        </div>
        <footer id="foot01">
            <p>  <?php echo date("Y"); ?> GPA-calculator. All rights reserved.</p>
        </footer>
    </body>
  </body>
</html>