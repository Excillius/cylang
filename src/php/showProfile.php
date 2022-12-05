<?php
    session_start();
    require_once('../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    $conn = mysqli_connect($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);

    $id = $_SESSION['id'];
    $username = "SELECT * FROM users WHERE id='$id'";
    $get_rows = mysqli_query($conn, $username);

    while($row = mysqli_fetch_array($get_rows))
    {
        $name = $row['username'];
        $email = $row['email'];
        $address = $row['domicile'];
    }
?>