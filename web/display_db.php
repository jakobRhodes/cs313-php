<?php
require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
<title>Database</title>
</head>
<body>
<h1>Database Inserted Data</h1>
<div>
<?php

$statement = $db->prepare('SELECT User_Name FROM User_Account');
$statement->execute();
echo $row['User_Name'];
?> 
</div>
</body>
</html>