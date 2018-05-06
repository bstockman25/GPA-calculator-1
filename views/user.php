<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
?>
<h1><?php echo'Welcome '.$_SESSION['username']; ?></h1>
<div align = "center">
    <div id = "User_Manage">
        <p>User Settings</p>

        <hr></hr>
        <form action = "../api/sUser.php" method='post'>
            <label for="fname">First Name:</label>
            <input type="text" required name="fname" id="fname" value="<?php echo$_SESSION['firstname']; ?>">
            <br>
            <br>
            <label for="lname">Last Name:</label>
            <input type="text" required name="lname" id="lname"value="<?php echo$_SESSION['lastname']; ?>">
            <br>
            <br>
            <label for="uemail">Email:</label>
            <input type="text" required name="uemail" id="uemail" value="<?php echo$_SESSION['email']; ?>">
            <br>
            <br>
            <label for="ugradepoints">Grade Points:</label>
            <input type="number" step="any" required name="ugradepoints" id="ugradepoints" value="<?php echo$_SESSION['gradepoints']; ?>">
            <br>
            <br>
            <label for="ucredits">Credits:</label> 
            <input type="number" step="any" required name="ucredits" id="ucredits" value="<?php echo$_SESSION['credits']; ?>">
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <hr></hr>
        <h1>WARNING THIS WILL DELETE YOUR USER ACCOUNT AND ALL DATA!!!!</h1>
        <form name="DeleteUser" action="../deleteuser/" method="post">
            <input type="submit" name="submit" value="Delete User Account" />
        </form>
        <hr></hr>

    </div>
</div>