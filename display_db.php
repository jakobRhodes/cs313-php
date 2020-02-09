<!DOCTYPE html>
<html>
<head>
<?php
$db = NULL;

	try {
		// default Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');

		// Get the various parts of the DB Connection from the URL
		$dbopts = parse_url($dbUrl);

		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');

		// Create the PDO connection
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

		// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $ex) {
		echo "Error connecting to DB. Details: $ex";
		die();
	}
?>
<title>Database</title>
</head>
<body>
<h1>Database Inserted Data<h1>
<div>
<?php
$statement = $db->prepare("SELECT User_Name, User_Password FROM User_Account");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$user_name = $row['User_Name'];
	$user_password = $row['User_Password'];

	echo "<p>$user_name $user_password<p>";
}
?> 
</div>
</body>
</html>
