<?php
    session_start();
    require_once('../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    $conn = mysqli_connect($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);

    $select_enc = "SELECT * FROM enc ORDER BY encID DESC LIMIT 1";
    $get_rows = mysqli_query($conn, $select_enc);
    while($row = mysqli_fetch_array($get_rows))
    {
        $input = $row['plnStr'];
        $type = $row['typeEnc'];
        $output = $row['encStr'];
    }
?>