<?php
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }
?>
<!doctype html>
<html ng-app="GPAapp">
    <head>
        <title>MyGPA-Calculator</title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-route.js"></script>
        <link rel="stylesheet" ng-href="style.css">
    </head>
    <body>
        <div class="main">
            <div class="navbar">
                <nav id="nav01">
                    <ul id="menu" bs-active-link>
                        <li><a href="#/">Main</a></li>
                        <li><a href="#/edit">Edit</a></li>
                        <li><a href="#/new">New</a></li>
                    </ul>
                </nav>
                <nav id="nav02">
                    <ul id="menu2">
                        <li>
                            <a href="#/">MyGPA</a>
                        </li>
                    </ul>
                </nav>
                <nav id="nav03">
                    <ul id="menu3">
                        <?php
                            if($_SESSION['logged'] == true){
                                echo '<li><a href="#/user">'.$_SESSION['username'].'</a></li>';
                                echo '<li><a href="/logout/">Log Out</a></li>';
                            }
                            else{
                                echo'<li><a href="#/login">Log In</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
            </div>
            <div id="center">
                <div id="left-stripe"></div>
                <div id="right-stripe"></div>
                <div id="content">
                    <div ng-view></div>
                </div>
            </div>
            <script src="model_controller_script.js"></script>
        </div>
        <footer id="foot01">
            <p>  <?php echo date("Y"); ?> GPA-calculator. All rights reserved.</p>
        </footer>
    </body>
  </body>
</html>