<?php
include 'connect.php';
$folder = "img/";
$link = $folder . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check xem file co ton tai truoc do hay khong
if (file_exists($link)) {
	echo $link;
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Cho phep up file len khi da qua cac buoc kiem tra
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $link)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "<br>".$link;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>