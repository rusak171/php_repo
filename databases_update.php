<?php
	require_once("error_reporting_file.php");
	# 1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "widget_cms";
	$dbpass = "secretpassword";
	$dbname = "widget_corp";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	# Test is connection occured
	if (mysqli_connect_errno()) {
		die("Database connection failed: ".
			mysqli_connect_error().
			" (".mysqli_connect_errno().")");
	}
?>
<?php
	# Often these are form values in $_POST
	$menu_name = "Delete me";
	$position = 4;
	$visible = 1;
	$id = 4;

	# 2. Perform database query
	$query  = "UPDATE subjects SET ";
	$query .= "menu_name = '{$menu_name}', ";
	$query .= "position = {$position}, ";
	$query .= "visible = {$visible} ";
	$query .= "WHERE id = {$id}";
	$result = mysqli_query($connection, $query);
	# Test if there was a query error
	if ($result && mysqli_affected_rows($connection) == 1) {
		# Success
		# redirect_to("some_page.php");
		echo "Success!";
	} else {
		# Failure
		# $message = "Subject update failed";
		die("Database query failed. ".mysqli_error($connection));
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Databases</title>
	</head>
	<body>
		
	</body>
</html>

<?php
	# 5. Close database connection
	mysqli_close($connection);
?>