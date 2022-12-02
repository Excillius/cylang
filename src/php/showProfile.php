<?php
    $conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');

    $koki = $_COOKIE["session"];

    $username = "SELECT * FROM users WHERE hashing='$koki'";
    $get_rows = mysqli_query($conn, $username);

    while($row = mysqli_fetch_array($get_rows))
    {
        $name = $row['username'];
        $email = $row['email'];
        $address = $row['domicile'];
    }
?>