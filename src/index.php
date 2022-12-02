<?php
    include './php/index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>CY-Lang</title>
    <script src="/js/logout.js"></script>
</head>
<body>
    <header>
        <div class="headerkiri">
            <a>CY-LANG</a>
        </div>
        <div class="headerkanan">
            <a href="./encryption.php">Encrypt</a>
            <a href="./decryption.php">Decrypt</a>
            <a href="./profile.php">Account</a>
            <a href="./logout.php"><img src="/Assets/logout.png" alt=""></a>
        </div>
    </header>
    <div class="isi">
        <div class="wrapping-isi">
            <div class="judul">
                <h1>
                    Welcome!
                </h1>
            </div>
            <div class="subjudul">
                <h2>
                    We serve you the best encryption and decryption tools!
                </h2>
            </div>
            <div class="tryitnow">
                <a href="./encryption.php"><button class="button" role="button">Try it now!</button></a>
            </div>
        </div>  
    </div>
    <footer>
    </footer>
</body>
</html>
