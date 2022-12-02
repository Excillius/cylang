<?php

    $conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');
    
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['newPass']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);

    $koki = $_COOKIE["session"];
    $update_users = "UPDATE users SET username = '$username', email = '$email', pass = '$pass', domicile='$address' WHERE hashing='$koki'";
    mysqli_query($conn, $update_users);

    $mysql_get_users = "SELECT * FROM users WHERE hashing='$koki'";
    $get_rows = mysqli_query($conn, $mysql_get_users);

    if($row = mysqli_fetch_assoc($get_rows))
    {
        $sess = hash('sha256', $email);
        setcookie('session', $sess, time() + (60 * 60), '/');
        $update_users = "UPDATE users SET hashing='$sess' WHERE email='$email'";
        mysqli_query($conn, $update_users);
        echo "<script>alert('You have successfully updated your profile!!');window.location = 'http://0.0.0.0:3738/profile.php';</script>";
    }
?>
