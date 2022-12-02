<?php
    $conn = mysqli_connect('cylang_db', 'cylang', '7:2,M4AytU:Rf7', 'logindb');

    $select_dec = "SELECT * FROM dcr ORDER BY decID DESC LIMIT 1";
    $get_rows = mysqli_query($conn, $select_dec);
    while($row = mysqli_fetch_array($get_rows))
    {
        $input = $row['decStr'];
        $type = $row['typeEnc'];
        $output = $row['plnStr'];
    }
?>
