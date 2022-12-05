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
            <a href="./logout.php"><img src="/Assets/logout.png" alt=""></a>
        </div>
    </header>
    <div class="isi">
        <div class="wrapping-isi">
            <div class="judul">
                <h1 id="namaUser" ></h1>
            </div>
            <div class="profile">
                <form name="update" action="/php/update.php" method="post">
                    <div class="kotakInformasi">
                        <h3>Profile Picture</h3>
                        <input type="file" name="profilpic" id="profilpic">
                        
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
<?php
$upload_dir = "storage/";

if (!file_exists($upload_dir))
mkdir($upload_dir, 0777, true);

$error = "";

$file_hash = uniqid();
$file_name = md5('$file_hash') . '_' . time() . '_' . basename($_FILES["file"]["name"]);
$store_file = $upload_dir . $file_name;
$file_type = strtolower(pathinfo($store_file, PATHINFO_EXTENSION));

if (file_exists($store_file))
$error = "Sorry, file already exists.";

if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg")
$error = "This extension is not allowed.";

if ($_FILES['file']['size'] > 2000000)
$error = "File must be less than or equal to 2MB.";

if (empty($error)) 
{
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $store_file)) 
    echo "The file has been uploaded.";
 
    else
    echo "Error: There was an error uploading your file.";
} 

else 
echo "Error: " . $error;


function validate_header(){
    if ( !file_exists( $file ) ) return false;
    if ( $f = fopen($file, 'rb') ) 
	{
        $header = fread($f, 8);
        fclose($f);
	// Signature = PNG & JPG
        if((strncmp($header, "\x89\x50\x4e\x47\x0d\x0a\x1a\x0a", 8)==0 && strlen ($header)==8) ||(strncmp($header, "\xff\xd8\xff", 3)==0 && strlen ($header)==3) )
        {
            echo "The file has been uploaded."
        }
        
    }
    echo "Error: File format is not PNG or JPG!"
}

?>
