<?php
    
    session_start();
    $name = $_SESSION["username"];
    $email = $_SESSION["email"];
    $address = $_SESSION["domicile"];

    if(empty($_SESSION['file']) === true){
        $uploads = "./Assets/default.png";
    } else{
        $uploads = "./php/".$_SESSION['file'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/profile.css">
    <script src="/js/logout.js"></script>
    <title>CY-Lang</title>
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
                <img src="<?php echo $uploads ?>" alt="" style="width: 200px; border-radius: 50%;"> 
                <h1 id="namaUser" >
                    <script>
                        document.getElementById("namaUser").innerHTML = "<?php echo $name; ?>";
                    </script>
                </h1>
            </div>
            <div class="subjudul">
                <h2>Here's your profile</h2>
            </div>
            <div class="profile">
                <div class="update">
                    <a href="./profilePicture.php"><p>Update Profile Picture</p></a>
                    <a href="./update.php"><p>Update Profile</p></a>
                </div>
                <div class="kotakInformasi">
                    <div class="informasi">
                        <h3>Email</h3>
                        <p id="emailUser">
                            <script>
                                document.getElementById("emailUser").innerHTML = "<?php echo $email; ?>";
                            </script>
                        </p>
                    </div>
                    <div class="informasi">
                        <h3>Password</h3>
                        <p id="passUser">
                            ******
                        </p>
                    </div>
                    <div class="informasi">
                        <h3>Address</h3>
                        <p id="addressUser">
                            <script>
                                document.getElementById("addressUser").innerHTML = "<?php echo $address; ?>";
                            </script>
                        </p>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <footer>

    </footer>
</body>
</html>
