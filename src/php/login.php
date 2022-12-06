<?php

require_once('../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$conn = mysqli_connect($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$mysql_get_users = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
$get_rows = mysqli_query($conn, $mysql_get_users);

if($row = mysqli_fetch_assoc($get_rows))
{
    //start session
    session_start();

    //session id
    $_SESSION['id'] = $row['id'];

    //session username
    $_SESSION['username'] = $row['username'];

    //session email
    $_SESSION['email'] = $row['email'];

    //session file
    $_SESSION['file'] = $row['uploads'];

    
    echo "<script>alert('You have successfully login!!');window.location = 'http://0.0.0.0:3738/index.php';</script>";
}

else
echo "<script>alert('Either email or password is incorrect!!');window.location = 'http://0.0.0.0:3738/login.html';</script>";

?>
