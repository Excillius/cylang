<?php
    session_start();
    session_destroy();
    header('location: ../login.html');
    exit();
    // echo "<script>alert('You have successfully logout!!');window.location = '../login.html';</script>";
?>