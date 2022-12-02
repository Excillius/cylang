<?php

$conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');

function check_dupli($conn, $input)
{
    $mysql_get_users = "SELECT id FROM users WHERE username='$input'";
    $get_rows = mysqli_query($conn, $mysql_get_users);

    if($row = mysqli_fetch_assoc($get_rows)) 
    return true;
    
    else
    return false;
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['pass1']);
$email = mysqli_real_escape_string($conn,$_POST['email']);

$duplUsername = check_dupli($conn,$username);
$duplEmail = check_dupli($conn,$email);

$token = sha1($username+$pass);
if ($duplUsername === false and $duplEmail === false) 
{
    $insert_user_db = "INSERT INTO users (email, username, pass, hashing) VALUES ('$email','$username', '$pass', '$token')";
    if (mysqli_query($conn, $insert_user_db))
    echo 
    "<script>
        alert('$username, you have successfully registered!');
        window.location = 'http://0.0.0.0:3738/login.html';
    </script>";
} 
else if ($duplUsername === true or $duplEmail === true)
echo "<script>alert('username or email is already exists');</script>";
 
else
echo "<script>alert('something went wrong');</script>";

?>
