<?php 
    //var_dump($_GET); 
    $host = "303.itpwebdev.com";
	$user = "rsho_db_user";
	$password = "junk4college";
	$db = "rsho_nbamvp";   
    $mysqli = new mysqli($host, $user, $password, $db);
    if($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit();
    }

    $sql = "SELECT Player.name, Games.count AS counts, Team.name AS teamer FROM Player JOIN Team, Games
    WHERE Player.Team_idTeam = Team.idTeam AND Player.Games_idGames = Games.idGames
    ORDER BY counts DESC;";
    $results = $mysqli->query($sql);
    if(!$results) {
        echo $mysqli->error;
        exit();
    }
    /*var_dump($results);
    echo "<hr>";
    echo "Number of results: " . $results->num_rows;
    while($row = $results->fetch_assoc()) {
        echo "<hr>";
        var_dump($row);
    }*/
    $row = $results->fetch_assoc();
    $results->data_seek(0);
    $mysqli->close(); 
?> 
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <style>
            .page-wrapper{
                width: 100%;
                height: auto;
                background-image: url('images/background.gif');
            }
            #description{
                background-color: black;
                color: white;
                padding: 5px;
            }
            #description table th{
                border: 1px solid white;
            }
            #charts{
                border: 1px solid white;
                margin-left: auto;
                margin-right: auto;
            }
            #footer{
                margin-top: 5%;
                background-color: black;
                height: 104px;
                display: flex;
                align-items: center;
            }
            #footer p{
                text-align: center;
                color: white;
            }
            .promo{
                width: 10%;
                float: left;
                margin: 10px;
            }
            .promo img{
                height: 50px;
                width: auto;
                border: 1px solid black;
            }
            .logo{
                float: left;
            }
            .logo img{
                height: 100px;
                width: auto;
                border: 1px solid black;
                padding: 1px;
            }
            
            @media (min-width: 992px){
                .page-wrapper{
                    width: 100%;
                }
                #title{
                    background-color: black;
                    width: 360px;
                    margin-left: 2%;
                    margin-right: auto;
                }
                #topnav{
                    float: right;
                    width: 70%;
                    height: 100%;
                    margin: none;
                    display: initial;
                }
                .hamburger{
                    display: none;
                }
                .menu{
                    display: none;
                }
                #description{
                    width: 69%;
                    float: right;
                    border: 1px solid white;
                }
                #description table th{
                    font-size: 40px;
                    border: 1px solid white;
                }
                #description table tr{
                    font-size: 20px;
                }
                .logo{
                    width: 25%;
                    height: auto;                   
                }
                .logo img{
                    height: 200px;
                    margin-left: 10%;
                }
                #cope{
                    display: none;
                }
                #footer{
                    margin-top: 40%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                #footer p{
                    font-size: 50px;
                    text-align: center;
                }
            }
        </style>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                <h1>2022 NBA MVP TRACKER</h1>            
            </div>
            <div class="logo">
                <a href="nbahome.php">
                    <img src="images/75logo.jpeg" alt="sign">
                </a>
            </div>
            <div id="description">
                <p>
                    The NBA MVP Award Tracker ranks candidates based on a model built using previous voting results. Players must have played in at least 70% of the league-wide average for team games to qualify. (From Basketball Reference)
                </p>
                <p>
                    How are MVP's selected officially? Well, the NBA gives 100 media members the rights of voting. The league then gives the selected voters the responsibility to rank the five MVP finalists in an order. So, their first choice becomes their most preferred MVP name, the second choice, the lesser preferred, and so on. The first position carries 10 points, followed by 7 points, 5 points, 3 points, and 1 point for the fifth. The player with the highest cumulative points takes home the coveted trophy.
                </p>
                <p>
                    There are four most dominant factors that go into the selection of a player. One, the personal stats of a player and how he has done on both ends of the court. Two, his performance's impact on the team's overall success in the regular season. Three, the athlete’s health and regularity in the season with playing the games. Lastly, the narrative (where media judgment comes in) about the name in the sports market. (Text from Essentially Sports)
                </p>
                <hr>
                <?php if( isset($error) && !empty($error)) :?>
					
					<div class="text-danger">
						<?php echo $error; ?>
					</div>

				<?php else: ?>
                <table id="charts">
                    <tr>
                        <th>Name</th>
                        <th>Games Played</th>
                        <th>Team</th>
                    </tr>
                    <?php $counter = 0 ?>
                    <?php while (( $row = $results->fetch_assoc() )&& ($counter < 3)) : ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['counts']; ?></td>
                            <td><?php echo $row['teamer']; ?></td>
                        </tr>
                        <?php $counter++;?>
                    <?php endwhile; ?>
                </table>
                <?php endif; ?>
            </div>
            <div id="footer">
                <div class="logo" id="cope">
                    <a href="nbahome.php">
                        <img src="images/75logo.jpeg" alt="sign">
                    </a>
                </div>
                <div class="promo">
                    <a href="https://www.twitter.com/NBA">
                        <img src="images/twitter.png" alt="twitter">
                    </a>
                </div>
                <div class="promo">
                    <a href="https://www.instagram.com/nba/?hl=en">
                        <img src="images/insta.png" alt="insta">
                    </a>
                </div>
                <div class="promo">
                    <a href="https://www.facebook.com/NBA">
                        <img src="images/facebook.png" alt="facebook">
                    </a>
                </div>
                <div class="promo">
                    <a href="https://www.tiktok.com/@nba?lang=en">
                        <img src="images/tiktok.jpeg" alt="tiktok">
                    </a>
                </div>
                <p>Follow the NBA!</p>
            </div>

            <ul class="menu">
                <li><a class="menuItem" href="nbahome.php">Home</a></li>
                <li><a class="menuItem" href="nbaregistration.php">Media</a></li>
                <li><a class="menuItem" href="nbastats.php">Advanced Stats</a></li>
                <li><a class="menuItem" href="nbaplayers.php">Build a Player</a></li>
            </ul>
            <button class="hamburger">
                <i class="menuIcon material-icons">menu</i>
                <i class="closeIcon material-icons">close</i>
            </button>
            <script>
                    const menu = document.querySelector(".menu");
                    const menuItems = document.querySelectorAll(".menuItem");
                    const hamburger= document.querySelector(".hamburger");
                    const closeIcon= document.querySelector(".closeIcon");
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
                        function(menuItem) { 
                            menuItem.addEventListener("click", toggleMenu);
                        }
                    )
            </script>
        </div>
    </body>
</html>