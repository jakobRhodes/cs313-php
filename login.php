<?php
if(isset($_GET['answer']))
{
    $answer = $_GET['answer'];
    if($answer == -1)
    {
        echo '<script>alert("incorrect username/password");</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
.login {
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
    </style>
</head>
<body>
<div class="login">
<h1>Please login!<h1>
<form action="verifyuser.php" method="post">
<label for="username">Username:</label>
<input type="text" id="username" name="username_input"><br><br>
<label for="password">Password:</label>
<input type="text" id="password" name="password_input"><br><br>
<input type="submit" value="Submit">
</form>
<a href="sign_up.php">Sign up!</a>
</div>
</body>
</html>