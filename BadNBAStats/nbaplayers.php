<?php 
    $host = "303.itpwebdev.com";
    $user = "rsho_db_user";
    $password = "junk4college";
    $db = "rsho_nbamvp"; 
    $mysqli = new mysqli($host, $user, $password, $db);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$mysqli->set_charset('utf8');

$sql_Player = "SELECT * FROM Player;";
$results_Player = $mysqli->query($sql_Player);
if ( $results_Player == false ) {
	echo $mysqli->error;
	exit();
}
$sql_Games = "SELECT * FROM Games;";
$results_Games = $mysqli->query($sql_Games);
if ( $results_Games == false ) {
	echo $mysqli->error;
	exit();
}
$sql_Team = "SELECT * FROM Team;";
$results_Team = $mysqli->query($sql_Team);
if ( $results_Team == false ) {
	echo $mysqli->error;
	exit();
}
$mysqli->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script src="https://unpkg.com/draggabilly@3/dist/draggabilly.pkgd.min.js"></script>
        <style>
            .logo {
                float: left;
            }
            .logo img {
                margin-top: 4%;
                width: 90%;
                height: auto;
                border: 1px solid black;
                padding: 1px;
                margin-left: 5%;
            }
            .create{
                color: white;
                border: 1px solid white;
                padding: 5%;
            }
            .create h2{
                text-align: center;
            }
            .form-control{
                margin: 2%;
                margin-left: 0px;
            }
            form{
                border: 1px solid white;
                padding: 2%;
            }
            .column button{
                margin-left: 43%;
            }
            @media (min-width: 768px){
                form{
                border: 1px solid white;
                padding: 2%;
                display: flex;
                flex-direction: row;
                }
                .column{
                    display: flex;
                    flex-direction: column;
                    width: 100%;
                }
                button{
                    margin-left: auto;
                    margin-right: auto;
                }
                .ad{
                    margin-left:15%;
                }
            }
            @media (min-width: 992px) {
                .hamburger {
                    display: none;
                }

                .menu {
                    display: none;
                }
                .page-wrapper {
                    width: 100%;
                    height: auto;
                    border: 1px solid white;
                    background-image: url('images/background3.gif');
                }

                #title {
                    background-color: black;
                    width: 26%;
                    margin-left: 2%;
                    margin-right: auto;
                }

                #topnav {
                    float: right;
                    width: 70%;
                    height: 100%;
                    margin: none;
                    display: initial;
                }
                .logo {
                    width: 10%;
                    height: auto;
                    float: right;
                    margin-right: 18%;
                    margin-top: 3%;
                }

                .logo img {
                    width: 250%;
                    margin-left: 0%;
                    margin-right: 0%;
                }
                form{
                border: 1px solid white;
                padding: 2%;
                display: flex;
                flex-direction: row;
                }
                .column{
                    display: flex;
                    flex-direction: column;
                    width: 100%;
                }
                button{
                    margin-left: auto;
                    margin-right: auto;
                }
                .ad{
                    float: right;
                    margin-top: -150px;
                    margin-right: 300px;
                    margin-left: 0px;
                }
                .ad2 img{
                    width: 15%;
                    height: auto;
                }
            }
        </style>
    </head>
    
    <body>
        <div class="page-wrapper">
            <nav>
                <div id="topnav">
                    <ul>
                        <li class="active"><a href="nbahome.php">Home</a></li>
                        <li><a href="nbastats.php">Advanced Stats</a></li>
                        <li><a href="nbaregistration.php">Media</a></li>
                        <li><a href="nbaplayers.php">Build a Player</a></li>
                    </ul>
                </div>
            </nav>
            <div id="title">
                <h1>Build Your Own Athlete!</h1>
            </div>
            <div class="logo draggable">
                <a href="nbahome.php">
                    <img src="images/75logo.jpeg" alt="sign">
                </a>
            </div>
            <ul class="menu">
                <li><a class="menuItem" href="nbahome.php">Home</a></li>
                <li><a class="menuItem" href="nbaregistration.php">Media</a></li>
                <li><a class="menuItem" href="nbastats.php">Advanced Stats</a></li>
                <li><a class="menuItem" href="nbaplayers.php">Build a Player</a></li>
            </ul>
        </div>
        <div class="ad draggable">
            <a href="https://www.jeep.com/">
                <img src="images/trash.jpeg" alt="ad">
            </a>
        </div>
        <div class="create">
            <h2>Fill in and compare in Advanced Stats! (Everything is draggable)</h2>
            <form class="form" action="add_confirmation.php" method="POST" name="myform">
                <div class="column">
                    <div class="form-control draggable">
                        <label for="name" id="label-name">
                            Player's full name:
                        </label>
                        <input type="text" id="name" name="name" placeholder="First Last">
                    </div>
                    <div class="form-control draggable">
                        <label for="WL" id="label-WL">
                            Win/Loss Percentage (W/L%):
                        </label>
                        <input type="number" id="WL" name="WL" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="minutes" id="label-minutes">
                            Minutes Per Game (MP):
                        </label>
                        <input type="number" id="minutes" name="minutes" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="fieldgoals" id="label-fieldgoals">
                            Field Goal Percentage (FG%):
                        </label>
                        <input type="number" id="fieldgoals" name="fieldgoals" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="threepoints" id="label-threepoints">
                            Three Point Percentage (3P%):
                        </label>
                        <input type="number" id="threepoints" name="threepoints" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="twopoints" id="label-twopoints">
                            Two Point Percentage (2P%):
                        </label>
                        <input type="number" id="twopoints" name="twopoints" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="freethrows" id="label-freethrows">
                            Free Throw Percentage (FT%):
                        </label>
                        <input type="number" id="freethrows" name="freethrows" placeholder="0">
                    </div>
                </div>
                <div class="column">
                    <div class="form-control draggable">
                        <label for="rebounds" id="label-rebounds">
                            Total Rebounds per Game (TRB):
                        </label>
                        <input type="number" id="rebounds" name="rebounds" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="assists" id="label-assists">
                            Assists per Game (AST):
                        </label>
                        <input type="number" id="assists" name="assists" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="steals" id="label-steals">
                            Steals per Game (STL):
                        </label>
                        <input type="number" id="steals" name="steals" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="blocks" id="label-blocks">
                            Blocks per Game (BLK):
                        </label>
                        <input type="number" id="blocks" name="blocks" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="turnovers" id="label-turnovers">
                            Turnovers per Game (TOV):
                        </label>
                        <input type="number" id="turnovers" name="turnovers" placeholder="0">
                    </div>
                    <div class="form-control draggable">
                        <label for="points" id="label-points">
                            Points per Game (PTS):
                        </label>
                        <input type="number" id="points" name="points" placeholder="0">
                    </div>
                </div>
                <div class="column">
                    <div class="form-control draggable">
                        <label for="team" id="label-team">
                            Team:
                        </label>
                        <input type="text" id="team" name="team" placeholder="DAL">
                    </div>
                    <div class="form-control draggable">
                        <label for="games" id="label-games">
                            Games played (rounded up to nearest 10):
                        </label>
                        <input type="number" id="games" name="games" placeholder="ex. 60, 70, 80">
                    </div>
                    <h2>Ready to submit?</h2>
                    <button type="submit" value="submit" class="draggable">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    
        <button class="hamburger">
            <i class="menuIcon material-icons">menu</i>
            <i class="closeIcon material-icons">close</i>
        </button>
        <script>
            var elem = document.querySelector('.draggable');
            var draggie = new Draggabilly( elem, {
            // options...
            });

            // or pass in selector string as first argument
            var draggie = new Draggabilly( '.draggable', {
            // options...
            });

            // if you have multiple .draggable elements
            // get all draggie elements
            var draggableElems = document.querySelectorAll('.draggable');
            // array of Draggabillies
            var draggies = []
            // init Draggabillies
            for ( var i=0; i < draggableElems.length; i++ ) {
            var draggableElem = draggableElems[i];
            var draggie = new Draggabilly( draggableElem, {
                // options...
            });
            draggies.push( draggie );
            }

            const menu = document.querySelector(".menu");
            const menuItems = document.querySelectorAll(".menuItem");
            const hamburger = document.querySelector(".hamburger");
            const closeIcon = document.querySelector(".closeIcon");
            const menuIcon = document.querySelector(".menuIcon");

            function toggleMenu() {
                if (menu.classList.contains("showMenu")) {
                    menu.classList.remove("showMenu");
                    closeIcon.style.display = "none";
                    menuIcon.style.display = "block";
                } else {
                    menu.classList.add("showMenu");
                    closeIcon.style.display = "block";
                    menuIcon.style.display = "none";
                }
            }

            hamburger.addEventListener("click", toggleMenu);

            menuItems.forEach(
                function (menuItem) {
                    menuItem.addEventListener("click", toggleMenu);
                }
            )


            function validateform(){  
                var name=document.myform.name.value;  
                var password=document.myform.WL.value;  
                
                if (name==null || name==""){  
                    alert("Name can't be blank");  
                    return false;  
                }
                else if(WL==null || WL==""){
                    alert("WL can't be blank");
                    return false;
                }  
            }  
        </script>
    </body>
</html>