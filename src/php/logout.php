<?php
    session_start();
    session_destroy();
    // header('Location: ./login.html');
    echo "<script>alert('You have successfully logout!!');window.location = './login.html';</script>";
?>