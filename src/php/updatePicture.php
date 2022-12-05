<?php
$upload_dir = "storage/";
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// create an error message
$error = "";

// get file name
$uploaded_file = $_FILES["file"];
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

function validateHeader($uploaded_file, $error){
    if ( !file_exists( $uploaded_file ) ) return false;
    if ( $f = fopen($uploaded_file, 'rb') ) 
    {
        $header = fread($f, 8);
        fclose($f);
    // Signature = PNG & JPG
        if(!((strncmp($header, "\x89\x50\x4e\x47\x0d\x0a\x1a\x0a", 8)==0 && strlen ($header)==8) ||(strncmp($header, "\xff\xd8\xff", 3)==0 && strlen ($header)==3)) )
        {
            $error = "Error: File format is not PNG or JPG!";
        }
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
validateHeader($uploaded_file);
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
?>