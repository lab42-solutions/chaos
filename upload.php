<?php

$allowedExtenstions = ['gif', 'jpg', 'php'];

$fName = $_FILES['imageUpload']['name'];
$fSize = $_FILES['imageUpload']['name'];
$fTmp = $_FILES['imageUpload']['tmp_name'];
$fType = $_FILES['imageUpload']['type'];
$fExt = strtolower(end(explode('.', $fName)));

$uploadPath = 'uploads/' . basename($fName);

if (! in_array($fExt,$allowedExtenstions)){
    echo "File extension not allowed";
    die();
}

if (! file_exists($uploadPath)) {
    move_uploaded_file($fTmp ,$uploadPath);
    echo "File uploaded";
}
else {
    echo "File already exists, not overriding";
    die();
}

header("Location: https://challenge.lab42.solutions/chaos/feedback.html");
?>
