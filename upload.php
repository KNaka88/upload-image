<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false){
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    //check if file already exists
    if (file_exists($target_file)) {
        echo "File already exists";
        $uploadOk = 0;
    }

    // Check file size
    if( $_FILES["fileToUpload"]["size"] > 10240000){
        echo "You can upload maximum 10MB";
        $uploadOk = 0;
    }

    //Alow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
        echo "You can upload only JPG, PNG, GIF files";
        $uploadOk = 0;
    }
}
