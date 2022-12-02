<?php
    $conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');
    
    $input = mysqli_real_escape_string($conn,$_POST['textbox-input']);
    $type = mysqli_real_escape_string($conn,$_POST['type-crypt']);
    $output = mysqli_real_escape_string($conn,$_POST['textbox-output']);

    $koki = mysqli_real_escape_string($conn,$_COOKIE["session"]);
    $select_id = "SELECT id FROM users WHERE hashing='$koki'";
    $get_rows = mysqli_query($conn, $select_id);
    while($row = mysqli_fetch_array($get_rows))
    {
        $IDusr = $row['id'];
    }
    $insert_history = "INSERT INTO dcr (usrID, decStr, plnStr, typeEnc) VALUES ('$IDusr','$input', '$output', '$type')";
    mysqli_query($conn, $insert_history);
    echo "<script>window.location = 'http://0.0.0.0:3738/decryption.php';</script>"; 
?>
