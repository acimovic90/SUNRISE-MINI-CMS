<?php 
include 'include/header-admin.php';
include 'include/classes/post.php';
include 'include/classes/upload.php';
//Controller for editing the profile checks which forms are submitted changes the specific form
if($_FILES["fileToUpload"])
{
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
upload::upload_pic($target_file);
user::update_user_picture($_SESSION["username"], $target_file);
header('Location: edit-profile-panel.php');

} 
elseif ($_POST['input-bio']) {
	user::update_user_bio($_SESSION["username"], $_POST['input-bio']);
	header('Location: edit-profile-panel.php');
}
elseif($_POST['input-password']){
	user::update_user_password($_SESSION["username"], $_POST['input-password']);
	header('Location: edit-profile-panel.php');
}


include 'include/footer-admin.php';

?>