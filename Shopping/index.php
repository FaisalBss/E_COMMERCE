<?php 
session_start();

require_once 'includes/valid.php';

$valid= new valid();
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = $valid->validate_login($username, $password);

    if ($user == true) {

        $_SESSION["username"] = $username;
        header("Location: homePage.php");
        exit;
    } else {
        $msg = "<span style='color:red;'>Invalid username or password.</span>";
    }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<form method="post">
    <h2>Login </h2>
    <p><?= $msg ?></p>
    
    Username:
    <input type="text" name="username" ><br><br>
    
    Password:
    <input type="password" name="password" ><br><br>
    
    <input type="submit" value="Login" >
    
<p>don't have an account ? <a href="signUp.php">sign-up here</a></p>
</form>


</body>
</html>

