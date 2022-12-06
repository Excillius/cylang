<?php
    session_start();

    $conn = mysqli_connect("cylang_db", "cylang", "7:2,M4AytU:Rf7", "logindb");

    $select_enc = "SELECT * FROM enc ORDER BY encID DESC LIMIT 1";
    $get_rows = mysqli_query($conn, $select_enc);
    while($row = mysqli_fetch_array($get_rows))
    {
        $input = $row['plnStr'];
        $type = $row['typeEnc'];
        $output = $row['encStr'];
    }
?>