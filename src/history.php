<?php
    include './php/showHistory.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/history.css">
    <script src="/js/profile.js"></script>
    <title>CY-Lang</title>
</head>
<body onload="displayProfile()">
    <header>
        <div class="headerkiri">
            <a href="index.php">CY-LANG</a>
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
                <h1 id="namaUser" ></h1>
            </div>
            <div class="subjudul">
                <h2>
                    Here's your history
                </h2>
            </div>
            <div class="profile">
                <div class="kotakInformasi">
                    <div class="informasi">
                        <div class="historyencrypt">
                            <h5>History Encrypt:</h5>
                            <br>
                            <p id="esbelum">
                                <script>
                                    document.getElementById("esbelum").innerHTML = "<?php echo $Einput; ?>";
                                </script>
                            </p>
                            <p id="ehasil">
                                <script>
                                    document.getElementById("ehasil").innerHTML = "<?php echo $Eoutput; ?>";
                                </script>
                            </p>
                            <p id="ejenis">
                                <script>
                                    document.getElementById("ejenis").innerHTML = "<?php echo $Etype; ?>";
                                </script>
                            </p>
                            <br>
                        </div>
                        <div class="historydecrypt">
                            <h5>History Decrypt:</h5>
                            <br>
                            <p id="dsbelum">
                                <script>
                                    document.getElementById("dsbelum").innerHTML = "<?php echo $Dinput; ?>";
                                </script>
                            </p>
                            <p id="dhasil">
                                <script>
                                    document.getElementById("dhasil").innerHTML = "<?php echo $Doutput; ?>";
                                </script>
                            </p>
                            <p id="djenis">
                                <script>
                                    document.getElementById("djenis").innerHTML = "<?php echo $Dtype; ?>";
                                </script>
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <footer>

    </footer>
</body>
</html>
