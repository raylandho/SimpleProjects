<?php


$isInserted = false;

// Check to make sure that required fields are filled out
if ( !isset($_POST['name']) || 
	empty($_POST['name']) || 
	!isset($_POST['WL']) || 
	empty($_POST['WL']) || 
	!isset($_POST['minutes']) || 
	empty($_POST['minutes']) || 
	!isset($_POST['fieldgoals']) || 
	empty($_POST['fieldgoals']) || 
	!isset($_POST['threepoints']) || 
	empty($_POST['threepoints']) ||
    !isset($_POST['twopoints']) || 
	empty($_POST['twopoints']) ||
    !isset($_POST['freethrows']) || 
	empty($_POST['freethrows']) ||
    !isset($_POST['rebounds']) || 
	empty($_POST['rebounds']) ||
    !isset($_POST['assists']) || 
	empty($_POST['assists']) ||
    !isset($_POST['steals']) || 
	empty($_POST['steals']) ||
    !isset($_POST['blocks']) || 
	empty($_POST['blocks']) ||
    !isset($_POST['turnovers']) || 
	empty($_POST['turnovers']) ||
    !isset($_POST['points']) || 
	empty($_POST['points']) ||
    !isset($_POST['team']) || 
	empty($_POST['team']) ||
    !isset($_POST['games']) || 
	empty($_POST['games'])  ) {

		$error = "Please fill out all required fields";
}
else {
	$host = "303.itpwebdev.com";
    $user = "rsho_db_user";
    $password = "junk4college";
    $db = "rsho_nbamvp"; 

	$mysqli = new mysqli($host, $user, $password, $db);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	// Write out the INSERT statement to add this song to the database
	$sql = "INSERT INTO Player(name, WL, MP, FG, ThreeP, TwoP, FT, TRB, AST, STL, BLK, TOV, PTS, Team_idTeam, Games_idGames)
    VALUES('" . $_POST["name"] . "',"
    . $_POST["WL"] . ", "
    . $_POST["minutes"] . ", "
    . $_POST["fieldgoals"] . ","
    . $_POST["threepoints"] . ","
    . $_POST["twopoints"] . ","
    . $_POST["freethrows"] . ","
    . $_POST["rebounds"] . ","
    . $_POST["assists"] . ","
    . $_POST["steals"] . ","
    . $_POST["blocks"] . ","
    . $_POST["turnovers"] . ","
    . $_POST["points"] . ","
    . "1" . ","
    . "1" . ");";
// Run the statement!
    $results = $mysqli->query($sql);
    if(!$results) {
        echo $mysqli->error;
        exit();
    }

	if($mysqli->affected_rows == 1){
		$isInserted = true;
	}
	
	$mysqli->close();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Confirmation | NBA Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body{
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="nbahome.php">Home</a></li>
		<li class="breadcrumb-item"><a href="nbaplayers.php">Add</a></li>
		<li class="breadcrumb-item active">Confirmation</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Add a Player</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

			<?php if(isset($error) && !empty($error)):?>
				<div class="text-danger">
					<?php echo $error;?>
				</div>
			<?php endif;?>
			
			<?php if($isInserted) : ?>
				<div class="text-success">
					<span class="font-italic"><?php echo $_POST["name"];?></span> was successfully added.
				</div>
			<?php endif;?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="nbaplayers.php" role="button" class="btn btn-primary">Back to Add Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>
