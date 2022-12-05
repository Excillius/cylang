<?php
require_once('../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$conn = mysqli_connect($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$mysql_get_users = "SELECT email, pass FROM users WHERE email='$email' AND pass='$pass'";
$get_rows = mysqli_query($conn, $mysql_get_users);
$rows = mysqli_fetch_assoc($get_rows);
var_dump($rows);

    session_start();
    if(isset($_SESSION['id']) && empty($_SESSION['id']) === true){
    echo "<script>alert('Please create an account or login to an account first!!');window.location = 'http://0.0.0.0:3738/login.html';</script>";
    }
    
?>
