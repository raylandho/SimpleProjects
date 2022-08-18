<?php
require "config/config.php";
$isDeleted = false;

// Make sure this file gets a track id. Otherwise, file doesn't know which track to delete
if ( !isset($_GET['idPlayer']) || empty($_GET['idPlayer']) 
		|| !isset($_GET['name']) || empty($_GET['name']) ) {
	$error = "Invalid Player.";
}
else {
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	// Generate the SQL statement
	$sql = "DELETE FROM Player
		WHERE idPlayer = " . $_GET["idPlayer"] . ";";



	// OR prepared statement way
	$statement = $mysqli->prepare("DELETE FROM Player WHERE idPlayer = ?");
	$statement->bind_param("i", $_GET["idPlayer"]);

	$executed = $statement->execute();
	if(!$executed) {
		echo $mysqli->error;
		exit();
	}

	// Check that only one row was affected
	if($statement->affected_rows == 1) {
		$isDeleted = true;
	}

	$statement->close();

	$mysqli->close();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete a Player</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body{
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Delete a Player</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger">
						<?php echo $error; ?>
					</div>
				<?php endif; ?>

				<?php if ( $isDeleted ) :?>
					<div class="text-success"><span class="font-italic"><?php echo $_GET['name'] ?></span> was successfully deleted.</div>
				<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="nbastats.php" role="button" class="btn btn-primary">Back to Search Results</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>