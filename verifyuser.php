<?php
   // default Heroku Postgres configuration URL
   $dbUrl = getenv('DATABASE_URL');

   if (empty($dbUrl)) {
      // example localhost configuration URL with postgres username and a database called cs313db
      $dbUrl = "postgres://postgres:password@localhost:5432/login";
   }

   $dbopts = parse_url($dbUrl);

   $dbHost = $dbopts["host"];
   $dbPort = $dbopts["port"];
   $dbUser = $dbopts["user"];
   $dbPassword = $dbopts["pass"];
   $dbName = ltrim($dbopts["path"], '/');

   try {
      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $ex) {
      print "<p>error: " . $ex->getMessage() . "</p>\n\n";
      die();
   }

$user = $_POST['username_input'];
$pass = $_POST['password_input'];

$statement = $db->prepare("SELECT User_Name, User_Password FROM User_Account WHERE UPPER(user_name) = UPPER(:user)");
$statement->bindValue(':user', $user, PDO::PARAM_STR);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
$username = $row['user_name'];
$passwordHash = $row['user_password'];
echo password_verify($pass, $passwordHash);
if(password_verify($pass, $passwordHash))
{
    session_start();
    $_SESSION['myusername'] = $username;
    header("Location: homepage.php");
}
else
{
    header("Location: login.php?answer=-1");
}