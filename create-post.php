<?php 
include 'include/header-admin.php';
include 'include/classes/post.php';
include 'include/classes/upload.php';

//here is the controller for create-post-panel.php

$target_dir = "upload/"; //the directory where the image gets stored
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);  
upload::upload_pic($target_file); //checks if the image fullfills the requirements

$results = user::read_user($_SESSION["username"]); //find the user with the current session

post::create_post($results["user_id"], $target_file, $_POST["title_post"], $_POST["text_post"]); //create the post and insert also $results["user_id"] as foreignkey 
header('Location: create-post-panel.php'); //go back
include 'include/footer-admin.php';
?>