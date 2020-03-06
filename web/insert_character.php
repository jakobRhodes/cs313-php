<?php
// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
   // example localhost configuration URL with postgres username and a database called cs313db
   $dbUrl = "postgres://postgres:password@localhost:5432/login";
}

$dbopts = parse_url($dbUrl);

// print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"], '/');

// print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
   print "<p>error: " . $ex->getMessage() . "</p>\n\n";
   die();
}
?>
<?php
$name = $_POST['character_name'];
$desc = $_POST['character_description'];
$race = $_POST['race'];
$str = $_POST['strength'];
$dex = $_POST['dexterity'];
$con = $_POST['constitution'];
$int = $_POST['intelligence'];
$wis = $_POST['wisdom']; 
$cha = $_POST['charisma']; 

try {
$statement = $db->prepare("INSERT INTO Player_Character (Character_Name, Character_Description, Character_Race, Character_STR, Character_DEX, Character_CON, Character_INT, Character_WIS,Character_CHA)
VALUES (:char_name, :char_desc, :race, :strength, :dex, :con, :intelligence, :wis, :cha)");
$statement->bindValue(":char_name", $name, PDO::PARAM_STR);
$statement->bindValue(":char_desc", $desc, PDO::PARAM_STR);
$statement->bindValue(":race", $race, PDO::PARAM_STR);
$statement->bindValue(":strength", $str, PDO::PARAM_INT);
$statement->bindValue(":dex", $dex, PDO::PARAM_INT);
$statement->bindValue(":con", $con, PDO::PARAM_INT);
$statement->bindValue(":intelligence", $int, PDO::PARAM_INT);
$statement->bindValue(":wis", $wis, PDO::PARAM_INT);
$statement->bindValue(":cha", $cha, PDO::PARAM_INT);
$inserted = $statement->execute();
if ($inserted){
   echo 'Character succesfully created!<br>';
}
} catch (PDOException $ex) { print "<p>error: " . $ex->getMessage() . "</p>\n\n";
   die();
}
?>

<html>
   <body>
      <a href="homepage.php">Return to Homepage!</a>
   </body>
</html>