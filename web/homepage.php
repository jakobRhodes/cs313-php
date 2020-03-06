<html>
<head>
<!--
    Connect to Heroku Databse 
-->
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
<style>
.header {
    text-align: center;
    background-color:teal;
    font-family: Book Antiqua;
    border-color: black;
    border-style: solid;
    color: white;
    text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; 
}
.login {
    text-align: center;
}
.character_select {
	text-align: center;	
}
.difficulty_select {
	text-align: center;
    
}
.start_quest {
	text-align: center;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px;
  background-color: white;
}
</style>
<title>Quest Adventure By Jakob Rhodes</title>
</head>
<body style="background-color:gray">
<div class="header">
<h1>Quest Adventure</h1>
</div>
<div class="login">
    <h2>Please login!<h2>
<form action="logged_in.php">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username_input"><br><br>
  <label for="password">Password:</label>
  <input type="text" id="password" name="password_input"><br><br>
  <input type="submit" value="Submit">
</form>
<a href="sign_up.php">Sign up!</a>
</div>
<div class="character_select">
    <h2>Select your Character!</h2>
    <select id="character_list">
    <?
$statement = $db->prepare("SELECT Character_Name FROM Player_Character");
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC)) { 
$name = $row['character_name'];
echo '<option value="character_list">'. $name . '</option>';
}
    ?>
    </select>
    <h2>Character List</h2>
 <table style="width:100%;">
<tr>
    <th>Character Name</th>
    <th>Character Description</th>
    <th>Character Stats</th>
  </tr>
<?
$statement = $db->prepare("SELECT Character_Name, Character_Description, Character_STR, Character_DEX, Character_CON, Character_INT, Character_WIS,Character_CHA FROM Player_Character");
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC)) { 
$name = $row['character_name'];
$desc = $row['character_description'];
$str = $row['character_str'];
$dex = $row['character_dex'];
$con = $row['character_con'];
$int = $row['character_int'];
$wis = $row['character_wis']; 
$cha = $row['character_cha']; 
echo "<tr><td>" . $name ."</td> <td>" . $desc . "</td> <td> STR" . $str . " DEX" . $dex . " CON" . $con . " INT" . $int . " WIS" . $wis . " CHA" . $cha . "</td></tr>";
}
?>
</table>
<br><br>
<form action="create_character.php">
<input type="submit" style="font-size:18px;" value="Create New Character!"/>
</form>
</div>
<div class="difficulty_select">
<h2>Select your Type of Quest!</h2>
<label for="difficulty">Difficulty: </label>
<select id="difficulty">
  <option value="difficulty" style="background-color: Green; ">Easy</option>
  <option value="difficulty" style="background-color: Orange;">Medium</option>
  <option value="difficulty"style="background-color: Red; ">Hard</option>
  </select>
</div>
<br>
<div class="start_quest">
<form action="encounter.php">
    <input type="submit" style="font-size:24px;" value="Begin your Adventure!"/>
</form>
</div>  
</body>
</html>
