<?php
session_start();

$file = $_FILES["file"]["name"];
$password = $_POST["password"];

$target_dir = "userImages/";

$target_file = $target_dir . basename($_FILES["file"]["name"]);


$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

$file = fopen("list.txt", "w+") or die("fayl tapilmadi");

if (!empty($file) && !empty($password)) {
    if ($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'gif') {
        if ($_FILES['file']['size'] < 500 * 1024) {
            //move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            fwrite($file, $password . "|" . $target_file);
            $_SESSION['success']  = true ;
            header('Location:success.php');
        } else {
            echo 'olçu boyukdu max 500 kb';
        }
    } else {
        echo 'bu fayl ' . $imageFileType;
    }
} else {
    echo "bos xana saxlama!";
    header('Location:index.php');
}

fclose($file);


