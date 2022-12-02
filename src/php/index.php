<?php
    session_start();
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE){
    echo "<script>alert(\"Please create an account or login to an account first!!\");window.location = 'http://0.0.0.0:3738/login.html';</script>";
    }
?>
