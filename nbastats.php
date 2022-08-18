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

    $sql = "SELECT * FROM Player;";
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
            h1{
                border: 1px solid white;
                margin-top: 40px;
            }
            .logo{
                float: left;
            }
            .logo img{
                margin-top: 4%;
                height: 100px;
                width: auto;
                border: 1px solid black;
                padding: 1px;
            }
            #survey{
                height: 300px;
                width: 250px; /*temporary */
                border: 1px solid white;
                float: right;
                color: white;
            }
            #stats{
                border: 1px solid white;
                margin-top: 70%;
                color: white;
                overflow-x: scroll;
            }
            #stats table th{
                border: 1px solid white;
            }
            #charts{
                border: 1px solid white;
                margin-left: auto;
                margin-right: auto;
                margin-top: 2%;
                margin-bottom: 2%;
            }
            form {
                margin: 50px auto;
                margin-top: 0px;
                padding: 30px 20px;
            }
            tr{
                background-color: gray;
            }
            td{
                border: 1px solid white;
            }
            .form-control {
                text-align: left;
                margin-bottom: 25px;
            }
        
            .form-control label {
                display: block;
                margin-bottom: 10px;
            }
            a{
                text-decoration: none;
                color: pink;
            }
            @media (min-width: 992px){
                .page-wrapper{
                    width: 100%;
                    height: auto;
                    background-image: url('images/background2.gif');
                    border: 1px solid white;
                }
                #title{
                    background-color: black;
                    width: 26%;
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
                .logo{
                    margin-left: 3%;
                }
                .logo img{
                    height: 200px;
                    width: auto;
                }
                #survey{
                    float: left;
                    margin-top: 20%;
                    margin-left: -20%;
                }
                #stats{
                    margin-top: 1.2%;
                    width: 70%;
                    float: right;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            <nav>
                <div id="topnav">
                    <ul>
                        <li><a href="nbahome.php">Home</a></li>
                        <li class="active"><a href="nbastats.php">Advanced Stats</a></li>
                        <li><a href="nbaregistration.php">Media</a></li>
                        <li><a href="nbaplayers.php">Build a Player</a></li>
                    </ul>
                </div>
            </nav>
            <div id="title">
                <h1>Advanced Stats</h1>            
            </div>
            <div class="logo">
                <a href="nbahome.php">
                    <img src="images/75logo.jpeg" alt="sign">
                </a>
            </div>
            <div id="survey">
                <form id="form">
                    <div class="form-control">
                        <label>Guess Who's the MVP?</label>
                        <label for="recommed-1">
                            <input type="radio" id="recommed-1" name="recommed">Giannis Antetokounmpo</input>
                        </label>
                        <label for="recommed-2">
                            <input type="radio" id="recommed-2" name="recommed">Nikola Jokic</input>
                        </label>
                        <label for="recommed-3">
                            <input type="radio" id="recommed-3" name="recommed">Joel Embiid</input>
                        </label>
                        <label for="recommed-4">
                            <input type="radio" id="recommed-4" name="recommed">Luka Doncic</input>
                        </label>
                        <label for="recommed-5">
                            <input type="radio" id="recommed-5" name="recommed">Chris Paul</input>
                        </label>
                        <label for="recommed-6">
                            <input type="radio" id="recommed-6" name="recommed">Other</input>
                        </label>
                    </div>
                    <a href="https://www.nba.com/news/finalists-announced-for-2021-22-nba-awards"><input type="submit"/></a>
                </form>
            </div>       
            <div id="stats">
                <?php if( isset($error) && !empty($error)) :?>
					
					<div class="text-danger">
						<?php echo $error; ?>
					</div>

				<?php else: ?>
                <table id="charts" class="table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>W/L%</th>
                            <th>MP</th>
                            <th>FG%</th>
                            <th>3P%</th>
                            <th>2P%</th>
                            <th>FT%</th>
                            <th>TRB</th>
                            <th>AST</th>
                            <th>STL</th>
                            <th>BLK</th>
                            <th>TOV</th>
                            <th>PTS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ( $row = $results->fetch_assoc() ) : ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['WL']; ?></td>
                            <td><?php echo $row['MP']; ?></td>
                            <td><?php echo $row['FG']; ?></td>
                            <td><?php echo $row['ThreeP']; ?></td>
                            <td><?php echo $row['TwoP']; ?></td>
                            <td><?php echo $row['FT']; ?></td>
                            <td><?php echo $row['TRB']; ?></td>
                            <td><?php echo $row['AST']; ?></td>
                            <td><?php echo $row['STL']; ?></td>
                            <td><?php echo $row['BLK']; ?></td>
                            <td><?php echo $row['TOV']; ?></td>
                            <td><?php echo $row['PTS']; ?></td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete this player?');" href="delete.php?idPlayer=<?php echo $row['idPlayer']; ?>&name=<?php echo $row['name']?>" class="btn btn-outline-danger delete-btn">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
                <?php endif; ?>
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