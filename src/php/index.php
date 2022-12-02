<?php
    error_reporting(E_ERROR | E_WARNING | E_NOTICE);
    $conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');

    $koki = $_COOKIE["session"];

    $email_hash = "SELECT hashing FROM users WHERE hashing='$koki'";
    $get_rows = mysqli_query($conn, $email_hash);

    if(mysqli_fetch_assoc($get_rows) === NULL)
    echo "<script>alert(\"Please create an account or login to an account first!!\");window.location = 'http://0.0.0.0:3738/login.html';</script>";
?>
