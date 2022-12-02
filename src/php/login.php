<?php

$conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');

$email = $_POST['email'];
$pass = $_POST['password'];
$mysql_get_users = "SELECT email, pass FROM users WHERE email='$email' AND pass='$pass'";
$get_rows = mysqli_query($conn, $mysql_get_users);

if($row = mysqli_fetch_assoc($get_rows))
{
    $sess = hash('sha256', $email);
    setcookie('session', $sess, time() + (60 * 60), '/');
    echo "<script>alert('You have successfully login!!');window.location = 'http://0.0.0.0:3738/index.php';</script>";
}

else
echo "<script>alert('Either email or password is incorrect!!');window.location = 'http://0.0.0.0:3738/login.html';</script>";

?>
