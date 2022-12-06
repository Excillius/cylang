<?php
    include './php/showEncrypt.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/encryption.css">
    <title>CY-Lang</title>
    <script src="/js/encryption.js"></script>
</head>
<body>
    <header>
        <div class="headerkiri">
            <a href="index.php">CY-LANG</a>
        </div>
        <div class="headerkanan">
            <a href="./encryption.php">Encrypt</a>
            <a href="./decryption.php">Decrypt</a>
            <a href="./profile.php">Account</a>
            <a href="./php/logout.php"><img src="/Assets/logout.png" alt=""></a>
        </div>
    </header>
    <div class="isi">
        <div class="wrapping-isi">
            <div class="judul">
                <h1>
                    Encryption!
                </h1>
            </div>
            <div class="content">
                <form action="./php/encrypt.php" method="POST" onsubmit="return update()">
                    <p><textarea id="textbox-input" name="textbox-input" autofocus></textarea>
                        <script>
                            document.getElementById("textbox-input").innerHTML = "<?php echo $input; ?>";
                        </script>
                    </p>
                    <div class="middle">
                        <div class="submit">
                            <button class="button-crypt" role="button" onclick="update()">submit</button>
                        </div>
                        <p><select name="type-crypt" id="type-crypt">
                            <option value="rot13" selected>rot13</option>
                            <option value="base64">base64</option>
                            <option value="hexadecimal">hexadecimal</option>
                            <option value="decimal">decimal</option>
                        </select></p>php
                        <!-- <a href="./history.php"><img src="/Assets/history.png" alt=""></a> -->
                    </div>
                    <p><textarea name="textbox-output" id="textbox-output" autofocus></textarea>
                        <script>
                                document.getElementById("textbox-output").innerHTML = "<?php echo $output; ?>";
                        </script>
                    </p> 
                </form>
            </div>
        </div>  
    </div>
    <footer>

    </footer>
</body>
</html>
<script src=""></script>
