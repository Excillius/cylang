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
// create a directory to keep uploaded file
$upload_dir = "storage/";
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// create an error message
$error = "";

// get file name
$uploaded_file_name = $_FILES["file"]["name"];
$uploaded_file_size = $_FILES["file"]["size"];
$uploaded_file_temp_directory = $_FILES["file"]["tmp_name"];

// function validate file extension (file type and more than one extension)
function validateExtension($uploaded_file_name, $error) {
    $file_array = explode(".", $uploaded_file_name);

    if (count($file_array) == 2) { // jika tipe data hanya 1
        $temp_file_type = strtolower($file_array[1]);

        if ($temp_file_type != "jpg" && $temp_file_type != "png" && $temp_file_type != "jpeg") {
            $error = "This extension is not allowed!";
        }
    }
    else { // jika tipe data lebih dari 1 atau kurang dari 1
        $error = "There was an error uploading your file.";
    }
}

// function validate file size (max 1MB)
function validateFileSize($uploaded_file_size, $error) {
    if ($uploaded_file_size > 1000000) {
        $error = "File must be 1MB or less in size.";
    }
}

// rename file
$new_rand_file_name = "";
function randomizeFileName($uploaded_file_name, $new_rand_file_name) {
    $file_hash = uniqid();
    $new_rand_file_name = md5("$file_hash") . "_" . time() . "_" . basename($uploaded_file_name);
}

validateFileSize($uploaded_file_size, $error);
validateExtension($uploaded_file_name, $error);
randomizeFileName($uploaded_file_name, $new_rand_file_name);

$upload_file_to = $upload_dir . $new_rand_file_name;
if (empty($error)) { // if no found error (validated and OK)
    if (move_uploaded_file($uploaded_file_temp_directory, $upload_file_to)) {
        echo "You have successfully updated your profile picture!";
    }
    else {
        echo "Error: There was an error uploading your file.";
    }
}
else {
    echo "Error: " . $error;
}

// ========================================

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
