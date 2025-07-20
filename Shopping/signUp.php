<?php 

require_once 'includes/valid.php';

$valid= new valid();
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $confirm = $_POST["confirm"];


$result = $valid->validation($name, $username, $password, $age , $confirm);
        if ($result === true) {
            $msg = "<span style='color:green;'>Registration successful! <a href='index.php'>Click here to login</a></span>";
        } else {
           $msg = "<span style='color:red;'>$result</span>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<form method="post">
    <h2>Create Account</h2>
    <p><?= $msg ?></p>
    
    Name:
    <input type="text" name="name" ><br><br>
    
    Username:
    <input type="text" name="username" ><br><br>
    
    Password:
    <input type="password" name="password" ><br><br>
    
    Confirm Password:
    <input type="password" name="confirm" ><br><br>
    
    Date of Birth:
    <input type="number" name="age" ><br><br>
    
    <input type="submit" value="Register">
    
<p>Already have an account? <a href="index.php">Login here</a></p>
</form>


</body>
</html>