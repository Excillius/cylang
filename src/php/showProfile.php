<?php
    session_start();
    $conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');

    $id = $_SESSION['id'];

    $username = "SELECT * FROM users WHERE id='$id'";
    $get_rows = mysqli_query($conn, $username);

    while($row = mysqli_fetch_array($get_rows))
    {
        $name = $row['username'];
        $email = $row['email'];
        $address = $row['domicile'];
    }
?>