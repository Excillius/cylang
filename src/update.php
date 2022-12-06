<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/update.css">
    <script src="../js/update.js"></script>
    <title>CY-Lang</title>
</head>
<body>
    <header>
        <div class="headerkiri">
            <a href="/index.php">CY-LANG</a>
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
                <h1 id="namaUser" ></h1>
            </div>
            <div class="profile">
                <form name="update" action="/php/updateData.php" method="post">
                    <div class="kotakInformasi">
                        <h2>ACCOUNT INFORMATION</h2>
                        <div class="updateAtas">
                            <div class="kiriAtas">
                                <div class="informasi">
                                    <h3>Username</h3>
                                    <input type="text" id="username" name="username"/>
                                </div>
                                <div class="informasi">
                                    <h3>Email</h3>
                                    <input type="text" id="email" name="email"/>
                                </div>
                            </div>
                            <div class="kananAtas">
                                <div class="informasi">
                                    <h3>Address</h3>
                                    <input type="text" id="address" name="address"/>
                                </div>
                            </div>
                        </div>
                        <h2>CHANGE YOUR PASSWORD</h2>
                        <div class="password">
                            <div class="currentpassword">
                                <h3>Current Password</h3>
                                <input type="password" id="curPass" name="curPass"/>
                            </div>
                            <div class="newpassword">
                                <h3>New Password</h3>
                                <input type="password" id="newPass" name="newPass"/>
                            </div>
                        </div>
                        <div class="buttonsubmit">
                            <input type="submit" name="update_submit" id="upSub" value="Save Change"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    </div>
    <footer>

    </footer>
</body>
</html>