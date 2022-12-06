<?php
    session_start();
    require_once('../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    $conn = mysqli_connect($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);

    $select_dec = "SELECT * FROM dcr ORDER BY decID DESC LIMIT 1";
    $get_rows = mysqli_query($conn, $select_dec);
    while($row = mysqli_fetch_array($get_rows))
    {
        $input = $row['decStr'];
        $type = $row['typeEnc'];
        $output = $row['plnStr'];
    }
?>
