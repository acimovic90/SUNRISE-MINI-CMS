<?php 
include 'include/header-admin.php';
include 'include/classes/post.php';
include 'include/classes/upload.php';
//update profile picture
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
upload::upload_pic($target_file);
user::update_user($_SESSION["username"], $target_file);
header('Location: edit-profile-panel.php');
include 'include/footer-admin.php';

?>