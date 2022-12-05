<?php
    session_start();
    if(isset($_SESSION['id']) && empty($_SESSION['id']) === true){
    echo "<script>alert('Please create an account or login to an account first!!');window.location = 'http://0.0.0.0:3738/login.html';</script>";
    }
?>
