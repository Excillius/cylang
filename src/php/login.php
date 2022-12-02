<?php

$conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$mysql_get_users = "SELECT email, pass FROM users WHERE email='$email' AND pass='$pass'";
$get_rows = mysqli_query($conn, $mysql_get_users);

if($row = mysqli_fetch_assoc($get_rows))
{
    //start session
    session_start();

    //session id
    $_SESSION['id'] = $row['id'];

    //session username
    $_SESSION['username'] = $row['username'];

    //session email
    $_SESSION['email'] = $row['email'];

    
    echo "<script>alert('You have successfully login!!');window.location = 'http://0.0.0.0:3738/index.php';</script>";
}

else
echo "<script>alert('Either email or password is incorrect!!');window.location = 'http://0.0.0.0:3738/login.html';</script>";

?>
