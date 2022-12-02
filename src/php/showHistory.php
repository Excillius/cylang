<?php
    $conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');
    
    $koki = $_COOKIE["session"];
    $get_id = "SELECT * FROM users WHERE hashing='$koki'";
    $get_rows = mysqli_query($conn, $get_id);
    while($row = mysqli_fetch_array($get_rows))
    {
        $IDusr = $row['id'];
    }
    
    $select_enc = "SELECT * FROM enc WHERE usrID='$IDusr' ORDER BY encID desc LIMIT 1";
    $get_rows = mysqli_query($conn, $select_enc);
    while($row = mysqli_fetch_array($get_rows))
    {
        $Einput = $row['plnStr']; 
        $Etype = $row['typeEnc'];
        $Eoutput = $row['encStr'];
    }

    $select_dec = "SELECT * FROM dcr WHERE usrID='$IDusr' ORDER BY decID desc LIMIT 1";
    $get_rows2 = mysqli_query($conn, $select_dec);
    while($row2 = mysqli_fetch_array($get_rows2))
    {
        $Dinput = $row2['decStr']; 
        $Dtype = $row2['typeEnc'];
        $Doutput = $row2['plnStr'];
    }
?>
