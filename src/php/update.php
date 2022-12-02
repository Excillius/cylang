<?php
    session_start();
    $conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');
    
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['newPass']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);

    $id = $_SESSION["id"];
    $update_users = "UPDATE users SET username = '$username', email = '$email', pass = '$pass', domicile='$address' WHERE id='$id'";
    mysqli_query($conn, $update_users);

    $mysql_get_users = "SELECT * FROM users WHERE id='$id'";
    $get_rows = mysqli_query($conn, $mysql_get_users);

    if($row = mysqli_fetch_assoc($get_rows))
    {
        $_SESSION["username"] = $row["username"];
        $_SESSION["email"] = $row["email"];
        echo "<script>alert('You have successfully updated your profile!!');window.location = 'http://0.0.0.0:3738/profile.php';</script>";
    }
?>
