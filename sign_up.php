<?php
$password_is_invalid = false;

if(isset($_GET['answer']))
{
    $answer = $_GET['answer'];
    if($answer == -1)
    {
        echo '<script>alert("Please fill in all fields");</script>';
    }
    else
    if($answer == -2)
    {
        echo '<script>alert("Passwords do not match");</script>';
    } elseif ($answer == -3) {
        $password_is_invalid = true;
    }

}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        .error {
            color: red;
        }

        .required-field::after {
            content: "* Passwords do not match";
            color: red;
            display: none;
        }
    </style>
</head>
<body>
<h1>Signup page</h1>
<form method="post" action="<?php echo htmlspecialchars('newuser.php'); ?>">
    User:<br>
    <input type="text" name="user" id="user"><br>
    Password:<br>
    <div class="required-field">
    <input type="password" name="password" id="password" onkeypress="submitCheck(this.value)">
    </div>
    <?php if ($password_is_invalid) { 
        ?>
        <span class="error">* Invalid Password</span>
        <?php 
    }
    ?>
    <br>
    Verify password:<br>
    <div class="required-field">
    <input type="password" name="verifypassword" id="verifypassword" onkeypress='passwordsMatch(document.getElementById("password").value, this.value)'>
    </div>
    <?php if ($password_is_invalid) { 
        ?>
        <span class="error">* Invalid Password</span>
        <?php 
    }
    ?>
    <br>
    <input type="submit" value="SIGN UP"><br>
    <script src="app.js"></script>
</form>
</body>
</html>