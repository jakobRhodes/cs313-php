<?php

$user = htmlspecialchars($_POST['user']);
$pass = htmlspecialchars($_POST['password']);
$verifypass = htmlspecialchars($_POST['verifypassword']);

$regex = "/^(?=.*\d).{7,}$/";

$valid_password = preg_match($regex, $pass);

if ($valid_password) {

    if ($user == "" or $pass == "") {
        header("Location: sign_up.php?answer=-1");
        die();
    }
    if ($pass != $verifypass) {
        header("Location: sign_up.php?answer=-2");
        die();
    }

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

    try
    {
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT into User_Account(User_Name, User_Password) values(:user, :pass)");
    $statement->bindValue(':user', $user, PDO::PARAM_STR);
    $statement->bindValue(':pass', $passHash, PDO::PARAM_STR);
    $statement->execute();

    }
    catch (Exception $ex)
    {
        header("Location: sign_up.php");
        die();
    }

    session_start();
    $_SESSION['myusername'] = $user;
    header("Location: index.php");

} else {
    header("Location: sign_up.php?answer=-3");
    die();
}