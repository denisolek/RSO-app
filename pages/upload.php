<?php
if ($user==NULL or $user['id']==NULL) {
  redirectJS('login');
}

$target_dir = "uploads/fullsize/";
$target_file = $target_dir . $user['username'] . '.png';
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$error_msg = "";
if(isset($_POST["submitUpload"])) {
    $check = getimagesize($_FILES["avatarInput"]["tmp_name"]);
    if($check === false) {
      $error_msg = $error_msg . 'File is not an image. \n';
      $uploadOk = 0;
    }
}
if ($_FILES["avatarInput"]["size"] > 500000) {
    $error_msg = $error_msg . 'Sorry, your file is too large. \n';
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error_msg = $error_msg . 'Sorry, only JPG, JPEG, PNG & GIF files are allowed. \n';
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    $error_msg = $error_msg . 'Sorry, your file was not uploaded. \n';
    alert($error_msg);
} else {
    if (move_uploaded_file($_FILES["avatarInput"]["tmp_name"], $target_file)) {
        alert('The file has been uploaded.');
        $fullsize = imagecreatefromstring(file_get_contents("uploads/fullsize/test.png"));

        resizeImage($fullsize, 256, 256, 'thumbnail');
        resizeImage($fullsize, 75, 80, 'thumbnail_small');


    } else {
        alert('Sorry, there was an error uploading your file.');
    }
}
// redirectJS('profile');
?>
