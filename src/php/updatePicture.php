<?php
session_start();
require_once('../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$conn = mysqli_connect($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);

print_r($_FILES['file']);
$upload_dir = "../storage/";
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// check if upload is empty
if ($_FILES['file']['error'] === 4)
{
    echo "<script>alert('File must not be empty');window.location = '../profilePicture.php'</script>";
    exit(); 
}

// get file details
$uploaded_file = $_FILES["file"];
$uploaded_file_name = $_FILES["file"]["name"];
$uploaded_file_size = $_FILES["file"]["size"];
$uploaded_file_temp_name = $_FILES["file"]["tmp_name"];

validateExtension($uploaded_file_name);
validateFileSize($uploaded_file_size);
$newFile = moveAndRenameFile($uploaded_file_temp_name, $upload_dir, $uploaded_file_name);
validateHeader($newFile);

// function validate file extension (file type and more than one extension)
function validateExtension($uploaded_file_name) {
    $file_array = explode(".", $uploaded_file_name);

    if (count($file_array) > 2) { // jika terdapat lebih dari satu extension
        echo "<script>alert('This extension is not allowed!');window.location = '../profilePicture.php'</script>";
        exit();    
    }    
}

// function validate file size (max 1MB)
function validateFileSize($uploaded_file_size) {
    if ($uploaded_file_size > 1000000) {
        echo "<script>alert('File must be 1MB or less in size.');window.location = '../profilePicture.php'</script>";
        exit();
    }
}

//function for move and renaming the file
function moveAndRenameFile($tmp, $upload_location, $file_name){
    $file_id = uniqid();
    $new_rand_file_name = md5($file_id) . "_" . time() . "_" . basename($file_name);
    $base_file = $upload_location . $new_rand_file_name;

    if (move_uploaded_file($tmp, $base_file)) {
        $_SESSION['file'] = $base_file;
        return $base_file;
        exit();
    }
    else {
        echo "<script>alert('There was an error uploading your file.');window.location = '../profilePicture.php'</script>";
        exit();
    }   
}

//function to check file by it's signature header
function validateHeader($file){
    if ( $f = fopen($file, 'rb') ) 
    {
        $header = fread($f, 8);
        $header = strtolower($header);
        fclose($f);

        // check file signature must be PNG or JPG/JPEG
        if( strncmp($header, "\x89\x50\x4e\x47\x0d\x0a\x1a\x0a", 8) != 0 )
        {
            $f = fopen($file, 'rb');
            $header = fread($f, 3);
            $header = strtolower($header);
            fclose($f);
            
            if ( strncmp($header, "\xff\xd8\xff", 3) != 0 )
            {
                unlink($file);
                echo "<script>alert('File format is not PNG or JPG/JPEG!');window.location = '../profilePicture.php'</script>";
                exit();
            } 
        }
    } 
}

$id = $_SESSION['id'];
$update_uploads = "UPDATE users SET uploads = '$newFile' WHERE id = '$id'";
mysqli_query($conn, $update_uploads);

echo "<script>alert('You have successfully updated your profile picture!');window.location = '../profilePicture.php'</script>";
?>